<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10.06.2016
 * Time: 18:45
 */

namespace App;


class DB
{
    use Singleton;
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

}