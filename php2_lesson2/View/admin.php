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
        </table>
        <?php
            foreach ($news as $value) {
                var_dump($value);
            }
          ?>
    </body>
</html>
