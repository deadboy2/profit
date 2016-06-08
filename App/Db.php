<?php

namespace App;

class Db
{
    protected $conn;

    function __construct()
    {
        $this->conn = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
    }

    public function ex($query)
    {
        $statement = $this->conn->prepare($query);
        $res = $statement->execute();
        return $res;
    }

    public function query($query)
    {
        $statement = $this->conn->prepare($query);
        $res = $statement->execute();
        if (false !== $res) {
            return $statement->fetchAll();
        }
        return [];
    }
}