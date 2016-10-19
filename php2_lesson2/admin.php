<?php

require __DIR__ . '/App/Other/autoload.php';
/*
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

if (isset($_GET['title'])) {
    $title = $_GET['title'];
} else {
    $title = '';
}

if (isset($_GET['text'])) {
    $text = $_GET['text'];
} else {
    $text = '';
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'get';
}*/

$article = new \App\Model\Article();
$news = $article->findAll();

/*
if ('get' == $method) {
    $data = $article->findById($id);
} elseif ('save' == $method) {
    $article->save();
} elseif ('delete' == $method) {
    $article->delete();
}*/

include __DIR__ . '/View/admin.php';