<?php

namespace App\Model;

/**
 * Class User
 * @package App\Model
 */

class User extends Model
{
    public static $table = 'users';
    public $email;
    public $name;
    public $login;
    public $age;
}