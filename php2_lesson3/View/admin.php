<html>
    <head>
        <title>php2_lesson2</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <table>
          <tr>
            <td>id</td>
            <td>title</td>
            <td>article</td>
          </tr>
          <?php
            foreach ($news as $value) {
                echo '<tr>';
                echo '<td>' . $value->id . '</td>';
                echo '<td>' . $value->title . '</td>';
                echo '<td>' . $value->text . '</td>';
                echo '</tr>';
            }
          ?>
        </table>
        <br><br>
        <form action="admin.php" method="get">
        id: <input type="number" name="id" value="<?php echo $id;?>"><br><br>
        title: <input type="text" name="title" size="100" value="<?php echo $title;?>"><br><br>
        text: <textarea name="text" cols="100" rows="7"><?php echo $text;?></textarea><br><br>
        <button type="submit" name="method" value="get">Загрузить данные</button>
        <button type="submit" name="method" value="save">Сохранить</button>
        <button type="submit" name="method" value="delete">Удалить запись</button>
    </form>
    </body>
</html>
