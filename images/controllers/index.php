<?php


$link = mysqli_connect('db', 'root', 'example');

if (!$link){
    die('Код ошибки: '. mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error());
}
echo 'Успешно соединились';
$sql = "create table 'users' (id integer auto_increment primary key, name varchar(30), age integer);";
$res = mysqli_query($link,"
    SELECT *
    FROM table_list.lessons_table
") or exit(mysqli_error());

foreach($res as $row){

    echo $row["ID"];
    echo $row["name"];
    echo $row["para"];
}

mysqli_close($link);