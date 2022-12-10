<?php
$link = mysqli_connect('db', 'root', 'example');

if (isset($_POST)) {
    $value =  $_POST['lesson'];
    $sql = "INSERT INTO table_list.lessons VALUE  (NULL, '$value')";
}
if(mysqli_query($link, $sql)){
    echo "Записи успешно вставлены.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
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

</head>

<div class = "ssyl">
    <p><a href = "home.php">Домой</a></p>
    <p><a href = "add_lessons.php">добавить еще</a></p>
</div>



HTML;
