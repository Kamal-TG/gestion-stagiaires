<?php

namespace Core;

use PDO;

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        // mitigate XSS
        $params = array_map(fn($param) => htmlspecialchars($param), $params);

        $this->statement->execute($params);

        return $this;
    }
    
    public function get()
    {
        return $this->statement;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function errorInfo()
    {
        return $this->connection->errorInfo();
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
