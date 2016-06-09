<?php

namespace App;

class Db extends Singleton
{
    protected $conn;

    protected function __construct()
    {
        $this->conn = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
    }

    public function ex($query)
    {
        $statement = $this->conn->prepare($query);
        $res = $statement->execute();
        return $res;
    }

    public function query($query, $class)
    {
        $statement = $this->conn->prepare($query);
        $res = $statement->execute();
        if (false !== $res) {
            return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}