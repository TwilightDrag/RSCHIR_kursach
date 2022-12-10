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
</head>

<header>Добро пожаловать на <s>генератор расписаний!</s> хуй</header>

<div class = "ssyl">
    <p><a href = "add_lessons.php">Добавить предметы</a></p>
    <p><a href = "view_table.php">посмотреть предметы</a></p>
</div>



HTML;
