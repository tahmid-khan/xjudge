<?php

require 'StatusCode.php';

class Router
{
    private array $routes_controllers = [
        'GET' => [],
        'POST' => [],
    ];

    public function map_get(string $url_path, string $controller): void
    {
        $this->routes_controllers['GET'][$url_path] = $controller;
    }

    public function map_post(string $url_path, string $controller): void
    {
        $this->routes_controllers['POST'][$url_path] = $controller;
    }

    public function route(string $uri, string $method = 'GET'): void
    {
        $url_path = parse_url($uri, component: PHP_URL_PATH);
        $controllers = $this->routes_controllers[$method];

        foreach ($controllers as $route => $controller) {
            $route_params = matched_params($url_path, $route);
            if ($route_params !== false) {
                require "controllers/$controller";
                exit;
            }
        }

        abort(StatusCode::NOT_FOUND_404);
    }
}

function matched_params(string $path, string $route): false|array
{
    $params = [];

    $route_len = mb_strlen($route);
    $path_len = mb_strlen($path);
    $i = 0;
    $j = 0;

    while ($i < $route_len) {
        if ($j === $path_len) {
            if ($i != $route_len - 1 || $route[$i] != '/') {
                return false;
            }
            break;
        }

        if ($route[$i] != $path[$j]) {
            if ($route[$i] != ':') {
                return false;
            }

            $param_end = mb_strpos($route, '/', $i);
            $arg_end = mb_strpos($path, '/', $j);
            if ($arg_end === false) {
                if ($param_end !== false && $param_end != $route_len - 1) {
                    return false;
                }
                $arg_end = $path_len;
            }
            if ($param_end === false) {
                $param_end = $route_len;
            }

            $name = mb_substr($route, start: $i + 1, length: $param_end - ($i + 1));
            $value = mb_substr($path, start: $j, length: $arg_end - $j);
            $params[$name] = $value;

            $i = $param_end;
            $j = $arg_end;
        } else {
            $i++;
            $j++;
        }
    }

    if ($j != $path_len && ($j != $path_len - 1 || $path[$j] != '/')) {
        return false;
    }

    return $params;
}
