<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    public $id;

    public static function getAll()
    {
        $db = DB::getInstance();
        return $db->query('select * from ' . static::TABLE, [], static::class);
    }

    public static function findById($id)
    {
        $db = DB::getInstance();
        $res = $db->query('select * from ' . static::TABLE . ' where id=:id', [':id' => $id], static::class);
        if (!empty($res)) {
            return $res;
        }
        return false;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        $columns = [];
        $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'insert into ' . static::TABLE . '(' . implode(',', $columns) . ') values (' . implode(',', array_keys($values)) . ')';
        $db = DB::getInstance();
        $db->execute($sql, $values);
    }

    public function update()
    {
        $columns = [];
        $values = [];
        $id = '';

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                $id = $v;
                var_dump($id);
            }
            $columns[] = $k . '=:'.$k;
            $values[':' . $k] = $v;
        }

        $sql = 'update ' . static::TABLE . ' set ' . implode(',', $columns) . ' where id=' . $id;
        var_dump($sql);
        $db = DB::getInstance();
        $db->execute($sql, $values);
    }

    public function save()
    {
        if (!$this->isNew()) {
            $this->update();
            return;
        } elseif ($this->isNew()) {
            $this->insert();
            return;
        }
    }

    public function delete()
    {
        if ($this->isNew()) {
            return;
        }

        $id = '';

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                $id = $v;
                var_dump($id);
            }
        }

        $sql = 'delete from ' . static::TABLE . ' where id=:id';
        $db = DB::getInstance();
        $db->execute($sql, [':id' => $id]);

    }

}