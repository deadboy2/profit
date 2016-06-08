<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            'select * from ' . static::TABLE,
            static::class
        );
    }
}