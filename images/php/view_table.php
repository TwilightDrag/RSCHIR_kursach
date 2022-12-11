<?php
$link = mysqli_connect('db', 'root', 'example');
echo '<link rel="stylesheet" href="Styles/style.css">';

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


if($_POST['lesson'] == 'del') {
    mysqli_query($link, "DROP TABLE table_list.lessons_table");
    mysqli_query($link, "CREATE TABLE table_list.lessons_table(
                                      ID INT NOT NULL AUTO_INCREMENT,
                                      day char(11),
                                      para INT,
                                      name VARCHAR(200),
                                      room VARCHAR(200),
                                      PRIMARY KEY (ID));");

}

if($_POST['lesson'] == 'reset') {
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'1.12' , '1', 'Безопасность жизнедеятельности', '209-A')");
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '2', 'Моделирование бизнес-процессов', '209-A')");
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'3.12', '3', 'Основы сетевых технологий', '209-A')");
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'3.12' , '1', 'Безопасность жизнедеятельности', '209-A')");
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'2.12', '2', 'Дополнительные главы вычислительной математики', '209-A')");
    mysqli_query($link, "INSERT INTO table_list.lessons_table VALUE (NULL,'1.12', '3', 'Основы сетевых технологий', '209-A')");


}


echo "<p><a href = 'home.php'>Назад</a></p>";
echo <<<HTML
<form action="view_table.php" method="post">
    <p><input type="text" name="lesson" placeholder="напишите 'del'" size="25" /></p>
    <INPUT type="submit" value= "Сгрировать расписание">
</form>

HTML;


$sql = "create table 'users' (id integer auto_increment primary key, name varchar(30), age integer);";
$res = mysqli_query($link,"
    SELECT *
    FROM table_list.lessons_table
    ORDER BY 'day'
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
    foreach ($day_arr as $cell) {
           $lesson_arr[array_search($row['day'], $day_arr)][$row['para']] = $row['name']." ".$row['room'];
    }
}

echo '<table>';
    echo '<tr><th>пара\день</th>';
        foreach ($day_arr as $row) {
            echo "<th>$row</th>";

        }
    echo '</tr>';

    $para = 1;
    foreach ($res as $row) {
        echo '<tr>';
        echo "<td>$para</td>";
            foreach ($day_arr as $cell) {
                if($row['para'] == $para) {
                    $print = $lesson_arr[array_search($row['day'], $day_arr)][$row['para']];
                    echo "<td>$print</td>";
                }
            }
        $para += 1;
        echo '</tr>';
    }
echo '</table>';



mysqli_close($link);