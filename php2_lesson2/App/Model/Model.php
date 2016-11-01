<?php

namespace App\Model;

abstract class Model
{
    public $id;
    private $columns;
    private $substitution;
    
    public static function findAll ()
    {
        $db = new \App\Db();
        $data = $db->query(
                'SELECT * FROM ' . static::$table . ' ORDER BY id DESC',
                [],
                static::class
        );
        return $data;
    }
    
    public static function findById($id)
    {
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
    
    public function isNew ()
    {
        return empty($this->id);
    }
    
    private function dataForSql ()
    {
        $this->columns = [];
        $this->substitution = [];
        foreach ($this as $column => $value) {
            if ('columns' == $column || 'substitution' == $column) {continue;}
            $this->columns[]  = $column;
            $this->substitution [':' . $column] = $value;
        }

    }
    
    private function insert()
    {
        $this->dataForSql();
        $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', $this->columns) . ')
            VALUES
            (:' . implode(', :', $this->columns) . ')
            ';

        $db = new \App\Db();
        $db->execute($sql, $this->substitution);
        $this->id = $db->lastInsertId();
    }
    
    public function update()
    {
        $this->dataForSql();
        $sql = 'UPDATE ' . static::$table . ' SET ';
        foreach ($this->columns as $value) {
            $column[] = $value . '=:' . $value;
        }
        $sql .= implode(',', $column) . ' WHERE id=:id';

        echo $sql . '<br>';
        var_dump($this->substitution);
        $db = new \App\Db();
        $db->execute($sql, $this->substitution);
    }
    
    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    
    public function delete()
    {
        if (!$this->isNew()) {
            $sql = 'DELETE FROM news WHERE id=' . $this->id . ';';
            $db = new \App\Db();
            $db->execute($sql, $this->substitution);
        }
    }
}
