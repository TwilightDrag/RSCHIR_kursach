<?php
/**
 ** Класс конфигурации базы данных
 */
class DB{
    const USER = "admin";
    const PASS = 123;
    const HOST = "localhost";
    const DB   = "table";
    public static function mysqli_connect() {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db   = self::DB;
        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }
}