<?php

namespace App;

use App\Exceptions\Database;

class DB
{
    use Singleton;
    protected $conn;

    function __construct()
    {
        try {
            $this->conn = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (\PDOException $e) {
            throw new Database('ошибка в подключении к бд');
        }
    }

    public function execute($sql, $prop = [])
    {
        $statement = $this->conn->prepare($sql);
        $result = $statement->execute($prop);
        return $result;
    }

    public function query($sql, $prop = [], $class)
    {

        try {
            $statement = $this->conn->prepare($sql);
            $result = $statement->execute($prop);
            if ($result !== null) {
                return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        } catch (\PDOException $e) {
            throw new Database('ошибка в запросе к бд');
        }

        return [];
    }
}