<?php

$link = mysqli_connect('db', 'root', 'example');

set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);

$userid = $_GET['loggedUser'];
$res = mysqli_query($link, "select * from table_list.admins where ID = '$userid'");
$result = $res->fetch_all();
if(!empty($result)) {
    echo <<<HTML
    <head>
        <link rel="stylesheet" href="Styles/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<div class = "container">
HTML;


    if ((int)$_GET["id"]) {
        $id = $_GET["id"];
        // функция удаления страниц
        $link = mysqli_connect('db', 'root', 'example');
        $req = "DELETE FROM table_list.admins WHERE ID = '$id'";
        mysqli_query($link, $req) or exit(mysqli_error());
    }

    echo <<<HTML
</div>
<div class = "container">
    <a class="btn btn-info" href = "home.php">Домой</a>
    <a class="btn btn-info" href = "add_places.php">добавить еще</a>
</div>


HTML;

    $sql = "SELECT * FROM table_list.admins";
    $result = $link->query($sql);
    echo '<p></p><div class = "container"><table border="1">';
    foreach ($result as $row) {
        $id = $row['ID'];
        $name = $row['name'];
        if ($row['name'] != NULL)
            echo "<tr><td>$id</td><td>$name</td></td><td><a href='admin_table=$id'>&#9746;</a></td></tr>";
    }
    echo '</table>
</div>';
}else {
    echo <<<HTML
        <h1>Вы не админ, войдите под учетной записью администратора</h1>

HTML;
}