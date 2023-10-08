<?php

class Database
{
    private PDO $connection;
    private PDOStatement $statement;

    private bool $success = false;

    public function __construct(array $config, string $username = "root", string $password = "")
    {
        $host = $config['host'];
        $port = $config['port'];
        $dbname = $config['dbname'];
        $charset = $config['charset'];
        $username = $config['user'] ?? $username;
        $password = $config['password'] ?? $password;

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true,
        ];
        $this->connection = new PDO($dsn, $username, $password, $options);
    }

    public function query(string $query, array|null $params = null): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->success = $this->statement->execute($params);
        return $this;
    }

    public function is_success(): bool
    {
        return $this->success;
    }

    public function result(): mixed
    {
        return $this->statement->fetch();
    }

    public function result_or_fail(callable $on_fail): mixed
    {
        $res = $this->statement->fetch();
        if (!$res) {
            $on_fail();
        }
        return $res;
    }

    public function all_results(): false|array
    {
        return $this->statement->fetchAll();
    }

    public function last_insert_id(): false|string
    {
        return $this->connection->lastInsertId();
    }
}
