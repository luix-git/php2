<?php

namespace App\Model;

abstract class Model {
    public $id;
    public static function findAll () {
        $db = new \App\Db();
        $data = $db->query(
                'SELECT * FROM ' . static::$table . ' ORDER BY id DESC',
                [],
                static::class
        );
        return $data;
    }
    public static function findById($id) {
        $db = new \App\Db();
        $data = $db->query(
                'SELECT * FROM ' . static::$table . ' WHERE id=:id',
                [':id' => $id],
                static::class
        );
        if ([] == $data) {
            return null;
        } else {
            return $data[0];
        }
    }
    public function isNew () {
        return empty($this->id);
    }
    public function insert() {
        if ($this->isNew()) {
            $columns = [];
            $binds = [];
            $data = [];
            foreach ($this as $column => $value) {
                if ('id' == $column) {continue;}
                $columns []  = $column;
                $binds [] = ':' . $column;
                $data [':' . $column] = $value;
            }
            $sql = 'INSERT INTO ' . static::$table . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $binds) . ')
                ';
            $db = new \App\Db();
            $db->execute($sql, $data);
            $this->id = $db->lastInsertId();
        }
    }
}
