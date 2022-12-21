<?php
session_start();

$link = mysqli_connect('db', 'root', 'example');
echo '<title>Таблица занятий</title><head>
    <link rel="stylesheet" href="Styles/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><title></title>
</head>';

set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

if (!$link){
    die('Код ошибки: '. mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error());
}

echo <<<HTML
        <div class = "container">
            <p><a href = 'home.php'>Назад</a></p>
        </div>
        <div class = "container">
HTML;

if($_SESSION['auth']) {
    if ($_POST['lesson'] == 'del') {
        mysqli_query($link, "TRUNCATE table_list.lessons_table");

    }

    if ($_POST['lesson'] == 'reset') {
        mysqli_query($link, "TRUNCATE table_list.lessons_table");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'1.12' , '1', 'Безопасность жизнедеятельности', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '2', 'Моделирование бизнес-процессов', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'3.12', '3', 'Основы сетевых технологий', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'3.12' , '1', 'Безопасность жизнедеятельности', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '2', 'Дополнительные главы вычислительной математики', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'1.12', '4', 'Основы сетевых технологий', '209-A')");
    }

    if ($_POST['lesson'] == 'gen') {
        mysqli_query($link, "TRUNCATE table_list.lessons_table");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'1.12' , '5', 'Безопасность жизнедеятельности', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'5.12', '2', 'Моделирование бизнес-процессов', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'3.12', '3', 'Основы сетевых технологий', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'4.12' , '4', 'Безопасность жизнедеятельности', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '5', 'Дополнительные главы вычислительной математики', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'5.12', '6', 'Основы сетевых технологий', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'4.12' , '4', 'Безопасность жизнедеятельности', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '1', 'Дополнительные главы вычислительной математики', '209-A')");
        mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '6', 'Основы сетевых технологий', '209-A')");
        $updateName = "UPDATE 
                     table_list.lessons_table, 
                     table_list.lessons
                SET 
                     lessons_table.name = lessons.name
                WHERE
                     lessons_table.id = lessons.id;";
        mysqli_query($link, $updateName);
        $updateaudit = "UPDATE 
                     table_list.lessons_table, 
                     table_list.places
                SET 
                     lessons_table.room = places.place
                WHERE
                     lessons_table.ID = places.ID;";
        mysqli_query($link, $updateaudit);

    }

    echo <<<HTML
        <div class = "container">
            <form action="view_table.php" method="post">
                <p><input type="text" name="lesson" placeholder="напишите 'del'" size="25" />
                <INPUT type="submit" class="btn btn-success" value= "Сгенировать расписание"></p>
            </form>
        </div>
        <div class = "container">
HTML;

}


$sql = "create table 'users' (id integer auto_increment primary key, name varchar(30), age integer);";
$res = mysqli_query($link,"
    SELECT *
    FROM table_list.lessons_table
    ORDER BY day
") or exit(mysqli_error());

$res2 = mysqli_query($link,"
    SELECT *
    FROM table_list.lessons_table
    ORDER BY 'para'
") or exit(mysqli_error());

$day_arr = array();
foreach ($res as $row){
    $day = $row['day'];
    if(!in_array($day, $day_arr)){
        array_push($day_arr, $day);

    }
}

$lesson_arr = array(array());
foreach ($res as $row) {
           $lesson_arr[array_search($row['day'], $day_arr)][$row['para']] = $row['name']." ".$row['room'];

}

echo '<table>';
    echo '<tr><th>пара\день</th>';
        foreach ($day_arr as $row) {
            echo "<th>$row</th>";

        }
echo '</tr>';


$para = 1;
$m = '';
for ($i = 0; $i < 6; $i++) {
    echo '<tr>';
    echo "<td>$para</td>";
    foreach ($day_arr as $cell) {
        foreach ($res as $row) {
            if ($row['day'] == $cell and $row['para'] == $para) {
                $print = $lesson_arr[array_search($row['day'], $day_arr)][$row['para']];
                $m = $print;
                break;
            } else {
                $m = " ";
            }
        }
        echo "<td>$m</td>";
    }
    $para += 1;
    if ($para > 6) break;
}
echo '</tr>';

echo '</table></div>
';



mysqli_close($link);