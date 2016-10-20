<?php

require __DIR__ . '/App/Other/autoload.php';

$id = $_GET['id'];

$news = App\Model\Article::findById($id);

include __DIR__ . '/View/article.php';