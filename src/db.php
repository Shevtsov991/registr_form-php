<?php


$serverName = "MySQL-8.2";
$userName = "root";
$pass ="";
$dbName = "users";

$connection = mysqli_connect($serverName, $userName, $pass, $dbName);

if (!$connection) {
    die("Ошибка подключения!". mysqli_connect_error() );
    
} else {
   "Подключение успешно ";
    
};
?>