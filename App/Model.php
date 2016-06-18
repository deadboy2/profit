<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    public $id;

    public static function findAll()
    {
        $db = DB::getInstance();
        return $db->query('select * from ' . static::TABLE,[], static::class);
    }

    public static function findById($id)
    {
        $db = DB::getInstance();
        return $db->query('select * from ' . static::TABLE . ' where id=:id', [':id' => $id], static::class)[0];
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;

        }
        var_dump($values);
        var_dump($columns);

        $sql = 'insert into ' . static::TABLE . ' (' . implode(',', $columns) . ') values (' . implode(',', array_keys($values)) . ')';

        $db = DB::getInstance();
        $db->execute($sql, $values);
    }

}