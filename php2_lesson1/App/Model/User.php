<?php

namespace App\Model;

class User extends Model{
    public static $table = 'users';
    public $id;
    public $email;
    public $name;
    public $login;
    public $age;
}