<!DOCTYPE html>
<html>
    <head>
        <title>php2_lesson1</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1><?php echo $news[0]->title; ?></h1>
        <p><?php echo $news[0]->text; ?></p>
        <a href="/index.php"><br><- Назад</a>
    </body>
</html>