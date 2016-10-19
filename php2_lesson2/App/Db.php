<?php

namespace App;

class Db {
    private $dbh;
    public function __construct() {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
        $this->execute('SET NAMES utf8');
    }
    public function execute ($sql, $data = []) {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        return true;
    }
    public function query ($sql, $data = [], $class = null) {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }
    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}