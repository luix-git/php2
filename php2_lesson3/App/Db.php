<?php

namespace App;

class Db {
    private $dbh;
    private $dsn;
    private $config;
    
    public function __construct()
    {
        $this->config = \App\Config::getObject();
        $this->dsn = $this->config->data['db']['host'];
        $this->dbh = new \PDO($this->dsn, 'root', '111');
        $this->execute('SET NAMES utf8');
    }
    
    public function execute ($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        return true;
    }
    
    public function query ($sql, $data = [], $class = null)
    {
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
    
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}