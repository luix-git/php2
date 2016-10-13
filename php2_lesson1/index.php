<?php

function __autoload($classname){
    require __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';
}

$news = App\Model\Article::findLast(5);

include __DIR__ . '/View/news.php';