<?php

require __DIR__ . '/App/Other/autoload.php';

$news = App\Model\Article::findAll();

$view = new \App\View();
$view->news = $news;

$html = $view->render(__DIR__ . '/View/news.php');
echo $html;