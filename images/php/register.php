<?php


echo <<<HTML
<head>
    <link rel="stylesheet" href="Styles/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<form action="action_page.php">
  <div class="container">
    <h1>Регистрация</h1>
    <p>Заполните форму регистрации.</p>
    <hr>
<p><a href = "home.php">Домой</a></p>

    <label for="login"><b>Логин</b></label>
    <input type="text" placeholder="Введите логин" name="login" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw" required>
<br>

    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
  </div><br>

  <div class="container signin">
    <p>Есть аккаунт? <a href="auth.php">Авторизируйтесь</a>.</p>
  </div>
</form>

HTML;
