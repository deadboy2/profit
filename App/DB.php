<?php

namespace App;

class DB
{
    use Singleton;
    protected $conn;

    function __construct()
    {
        $this->conn = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
    }

    public function execute($sql, $params = [])
    {
        $statement = $this->conn->prepare($sql);
        $result = $statement->execute($params);
        return $result;
    }

    public function query($sql,$params, $class)
    {
        $statement = $this->conn->prepare($sql);
        $result = $statement->execute($params);
        if ($result !== null) {
            return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}