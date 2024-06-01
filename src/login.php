<?php
require_once ("db.php");

$login = $_POST["login"];
$password = $_POST["password"];



if (empty($login) || empty($password)) {
    echo "Заполните все поля";
    

}else {
    $sql = "SELECT * FROM `users` WHERE  (tel = '$login' OR Email = '$login') AND password = '$password' ";
    $result = $connection -> query($sql);

    if ($result -> num_rows > 0) {
        $row = $result ->fetch_assoc();
        $id = $row["id"];
       header("Location: ./user-panel.php?id='$id'");
    }else{
        echo "Пользователь не найден";
        echo '<a href= "../index.php"><button>На главную</button></a>';
    }
    
}