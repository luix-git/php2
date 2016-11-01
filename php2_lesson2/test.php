<?php

require __DIR__ . '/App/Other/autoload.php';

$article = new \App\Model\Article();
$article->id = 9;
$article->title = time();
$article->text = 'test_N' . time();

$new = $article->update();

