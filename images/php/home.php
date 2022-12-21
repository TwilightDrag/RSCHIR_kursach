<?php
session_start();
$content = "<div class='main'>Hello, world!</div>";
$link = mysqli_connect('db', 'root', 'example');

set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

if (!empty($_POST['psw']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['psw'];

    $query = "SELECT * FROM table_list.admins WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        $_SESSION['auth'] = true;
    } else {
// неверно ввел логин или пароль
    }
}

if (!empty($_POST['psw']) and !empty($_POST['login'] and $_SESSION['auth'] != true)) {
    $login = $_POST['login'];
    $password = $_POST['psw'];

    $query = "SELECT * FROM table_list.users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        $_SESSION['user'] = $login;
    } else {
        echo "Неверный логин или пароль";
    }
}


function close_session(){
    session_destroy();
    session_start();
}

if(array_key_exists('close',$_POST)){
    close_session();
}
if($_SESSION['auth']) {
    echo "Admin User";
}elseif(!empty($_SESSION['user'])){
    echo $_SESSION['user'];
}

echo <<<HTML

		<style>
			.main {
				color: red;
			}
		</style>

<!--		<script src="/jquery.nicescroll.js"></script>-->
<head>
    <link rel="stylesheet" href="Styles/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<title>MyServer</title>
<header></header>

<div class = "container">
    <h1>Добро пожаловать на генератор расписаний!</h1>
    <div>
            <a href = "add_lessons.php" class="btn btn-info">Добавить предметы</a>
            <a href = "add_places.php" class="btn btn-info">Добавить места</a>
            <a href = "view_table.php" class="btn btn-info">посмотреть предметы</a>

HTML;

if(!$_SESSION['auth'] and empty($_SESSION['user'])) {
    echo <<<HTML
            <a href = "auth.php" class="btn btn-info">Вход</a>
            <a href = "register.php" class="btn btn-info">Регистрация</a>
    </div>
</div>
HTML;
}else {
    echo <<<HTML
            <br><br><form method="post" action="home.php">
                <input class="btn btn-info" type="submit" name="close" id="test" value="Выход" />
            </form>
    </div>
</div>
HTML;
}
