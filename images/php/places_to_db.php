<?php
session_start();
$link = mysqli_connect('db', 'root', 'example');
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
        $req = "DELETE FROM table_list.places WHERE ID = '$id'";
        mysqli_query($link, $req) or exit(mysqli_error());
    }
    if (isset($_POST)) {

        $value = $_POST['lesson'];
        $sql = "INSERT INTO table_list.places VALUE  (NULL, '$value')";
    }
    if (mysqli_query($link, $sql)) {
        echo "Записи успешно вставлены.";
    } else {
        echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
    }
    echo <<<HTML
</div>
<div class = "container">
    <a class="btn btn-info" href = "home.php">Домой</a>
    <a class="btn btn-info" href = "add_places.php">добавить еще</a>
</div>


HTML;

    $sql = "SELECT * FROM table_list.places";
    $result = $link->query($sql);
    echo '<p></p><div class = "container"><table border="1">';
    foreach ($result as $row) {
        $id = $row['ID'];
        $name = $row['place'];
        if ($row['place'] != NULL)
            echo "<tr><td>$id</td><td>$name</td></td><td><a href='places_to_db.php?id=$id'>&#9746;</a></td></tr>";
    }
    echo '</table>
</div>';
}
else {
    echo <<<HTML
        <div class = "container">
            <a class="btn btn-info" href = "home.php">Домой</a>
        </div>
        <h1>Вы не админ, войдите под учетной записью администратора</h1>

HTML;

}