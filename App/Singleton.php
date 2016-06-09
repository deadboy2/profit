<?php

namespace App;


trait Singleton
{
    protected static $instanse;

    protected function __construct()
    {

    }

    public static function getInstance()
    {
        if (static::$instanse === null) {
            static::$instanse = new static;
        }
        return static::$instanse;
    }
}