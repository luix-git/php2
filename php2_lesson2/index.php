<?php

require __DIR__ . '/App/Other/autoload.php';

$news = App\Model\Article::findLast(5);

include __DIR__ . '/View/news.php';