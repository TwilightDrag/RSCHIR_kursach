<?php
session_start();

set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

if($_SESSION['auth']) {
    echo <<<HTML

    <head>
        <meta charset="utf-8">
        <title>Добавляем предметы</title>
        <link rel="stylesheet" href="Styles/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class = "container">
            <p><a href = "home.php" >Назад</a></p>
            <form method= "POST" action="lesson_to_db.php">
                <p><input type="text" class="form-control" name="lesson" placeholder="Введите название дисцеплины" size="25" /></p>
                <INPUT type="submit" class="btn btn-success" value= "Отправить">
                </p>
            </form>
        </body>
    </div>


HTML;
}
else {
    echo <<<HTML
        <div class = "container">
            <a class="btn btn-info" href = "home.php">Домой</a>
        </div>
        <h1>Вы не админ, войдите под учетной записью администратора</h1>

HTML;
}

