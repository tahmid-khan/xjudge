<?php

require 'StatusCode.php';

class Router
{
    private array $routes_controllers = [
        'GET' => [],
        'POST' => [],
    ];

    public function register_get(string $url_path, string $controller): void
    {
        $this->routes_controllers['GET'][$url_path] = $controller;
    }

    public function register_post(string $url_path, string $controller): void
    {
        $this->routes_controllers['POST'][$url_path] = $controller;
    }

    public function route(string $uri, string $method = 'GET'): void
    {
        $url_path = parse_url($uri, component: PHP_URL_PATH);
        $controllers = $this->routes_controllers[$method];

        if (array_key_exists($url_path, $controllers)) {
            $controller = $controllers[$url_path];
            require "controllers/$controller";
        } else {
            abort(StatusCode::NOT_FOUND_404);
        }
    }
}
