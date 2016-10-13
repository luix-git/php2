<!DOCTYPE html>
<html>
    <head>
        <title>php2_lesson1</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            foreach ($news as $key) {
                ?><p><a href="article.php?id=<?php
                echo $key->id;
                ?>"><?php
                echo $key->title;
                ?></a></p><?php
            }
        ?>
    </body>
</html>
