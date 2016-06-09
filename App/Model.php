<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = Db::getInstance();
        return $db->query(
            'select * from ' . static::TABLE,
            static::class
        );
    }
}