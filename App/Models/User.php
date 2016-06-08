<?php

namespace App\Models;

use App\Db;

class User
{
    public $email;
    public $name;

    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            'select * from users',
            'App\Models\User'
        );
    }
}