<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    public $id;

    public function isNew()
    {
        return empty($this->id);
    }

    public function save()
    {
        if (!$this->isNew()) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public static function findAll()
    {
        $db = DB::getInstance();
        return $db->query('select * from ' . static::TABLE, [], static::class);
    }

    public static function findById($id)
    {
        $db = DB::getInstance();
        $res = $db->query('select * from ' . static::TABLE . ' where id=:id', [':id' => $id], static::class)[0];
        if (!empty($res)) {
            return $res;
        }
        return false;
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

        $sql = 'insert into ' . static::TABLE . ' (' . implode(',', $columns) . ') values(' . implode(',', array_keys($values)) . ')';
        $db = DB::getInstance();
        $db->execute($sql, $values);
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }

        $values = [];
        $valuess = [];
        $id = '';

        foreach($this as $k => $v) {
            if ('id' == $k) {
                $id = $v;
            }
            $values[] = $k . '=:' . $k;
            $valuess[':' . $k] = $v;
        }

        $sql = 'update ' . static::TABLE . ' set ' . implode(',', $values) . ' where id=' . $id;
        $db = DB::getInstance();
        $db->execute($sql, $valuess);
    }

    public function delete()
    {
        if ($this->isNew()) {
            return;
        }

        $id = '';

        foreach($this as $k => $v) {
            if ('id' == $k) {
                $id = $v;
            }
        }

        $db = DB::getInstance();
        $sql = 'delete from ' . static::TABLE . ' where id=:id';
        $db->execute($sql, [':id' => $id]);
    }
}