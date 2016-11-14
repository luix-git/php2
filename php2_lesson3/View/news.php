<!DOCTYPE html>
<html>
    <head>
        <title>php2_lesson3</title>
        <meta charset="UTF-8">
        <style>
            article a {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php foreach ($this->news as $article) : ?>
            <article>
                <h1>
                    <a href="article.php?id=<?php
                        echo $article->id;
                    ?>"><?php
                        echo $article->title;
                    ?></a>
                </h1>
                <div><?php echo $article->text; ?></div>
            </article>
        <?php endforeach; ?>
    </body>
</html>