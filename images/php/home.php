<?php
$content = "<div class='main'>Hello, world!</div>";
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
            <a href = "view_table.php" class="btn btn-info">Вход</a>
            <a href = "view_table.php" class="btn btn-info">Регистрация</a>

    </div>
</div>


HTML;
