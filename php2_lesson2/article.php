<?php

function __autoload($classname){
    require __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';
}

$id = $_GET['id'];

$news = App\Model\Article::findById($id);

include __DIR__ . '/View/article.php';