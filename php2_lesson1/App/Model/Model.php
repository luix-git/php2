<?php

namespace App\Model;

abstract class Model {
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
}
