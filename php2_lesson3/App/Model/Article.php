<?php

namespace App\Model;

class Article extends Model
{
    public static $table = 'news';

    public $title;
    public $text;
    public $author;

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
}
