<?php
require_once ("db.php");
require_once ("check_captcha.php");

function redirect_back(array $params = []) {
    $url = $_SERVER['HTTP_REFERER'];
    if(!empty($params)){
        $url .= '?' . http_build_query($params);
    }
    header('Location: ' . $url);
}


$smartToken = $_POST["smart-token"];
if(empty($smartToken)) {
    redirect_back(['error'=>'Пройдите капчу!']);
    exit();
 
} elseif(!check_captcha($smartToken)) {
    redirect_back(['error'=>'Smart token is incorrect']);
    exit();
}

$login = $_POST["login"];
$password = $_POST["password"];
$back = '<a href ="../index.php" ><button>На главную</button></a>';


if (empty($login) || empty($password)) {
    echo "Заполните все поля! </br>";
    echo $back;

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