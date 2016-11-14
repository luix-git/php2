<?php

require __DIR__ . '/App/Other/autoload.php';

$id = $_GET['id'];

$article = App\Model\Article::findById($id);

$view = new \App\View();
$view->article = $article;

$html = $view->render(__DIR__ . '/View/article.php');
echo $html;