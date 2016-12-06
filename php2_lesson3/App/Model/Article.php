<?php

namespace App\Model;

/**
 * Class Article
 * @package App\Model
 */

class Article
    extends Model
{
    public static $table = 'news';

    public $title;
    public $text;
    public $author_id;
    
    public static function findLast($number)
    {
        $news = Article::findAll();
        $res = [];
        foreach ($news as $key) {
            if (0 == $number) {break;}
            $res [] = $key;
            $number--;
        }
        return $res;
    }

    public function __get($key)
    {
        if ($key == 'author'){
            return Author::findById($this->author_id);
        }
    }

    public function __isset($key)
    {
        if ($key == 'author' && !empty($this->author_id)){
            return true;
        }
    }
}
