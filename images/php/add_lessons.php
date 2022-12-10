<?php

echo <<<HTML

    <head>
        <meta charset="utf-8">
        <title>Добавляем предметы</title>
        <link rel="stylesheet" href="Styles/style.css">
    </head>
    <body>
        <p><a href = "home.php">Назад</a></p>
        <form method= "POST" action="lesson_to_db.php">
            <p><input type="text" name="lesson" placeholder="Введите название дисцеплины" size="25" /></p>
            <INPUT type="submit" value= "Отправить">
            </p>
        </form>
    </body>



HTML;

