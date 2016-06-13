<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10.06.2016
 * Time: 18:49
 */

namespace App;


trait Singleton
{
    protected static $instance;

    protected function __construct()
    {

    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}