<?php

echo <<<HTML

    <head>
        <meta charset="utf-8">
        <title>Добавляем предметы</title>
        <link rel="stylesheet" href="Styles/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class = "container">
            <p><a href = "home.php">Назад</a></p>
            <form method= "POST" action="places_to_db.php">
                <p><input type="text" name="lesson" placeholder="Введите место" size="25" /></p>
                <INPUT type="submit" class="btn btn-success" value= "Отправить">
                </p>
            </form>
        </body>
    </div>


HTML;

