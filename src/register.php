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

$name = $_POST["name"]; 
$email = $_POST["email"]; 
$tel = $_POST["tel"]; 
$pass = $_POST["pass"]; 
$repPass = $_POST["repPass"]; 
$back = '<a href ="../index.php" ><button>На главную</button></a>';

if (empty($name)|| empty($email)||empty($tel)||empty($pass)|| empty($repPass)) {
    echo "Заполните все поля!" . '<br/>';
    echo '<a href ="../index.php" ><button>На главную</button></a>';
}else { 
    if ($pass != $repPass) {
    echo "Пароли не совпадают!" . '<br/>';
    echo $back;
    }else{

    $sql = "SELECT *FROM `USERS` WHERE tel = '$tel' OR Email = '$email'";
    $result = $connection -> query($sql);

        if ($result -> num_rows > 0) {
            $row = $result ->fetch_assoc();
            if ($row['tel'] === $tel) {
                echo "Пользователь с таким номером уже зарегистрирован!" . '<br/>';
                echo $back;
            }else if ($row['Email'] === $email) {
                echo "Пользователь с таким Email уже зарегистрирован!" . '<br/>';
                echo $back;
            } 
        }else {
        $sql = "INSERT INTO `users` (userName, password, Email, tel) VALUES ('$name', '$pass', '$email', '$tel')";
        
        if ($connection -> query($sql)) {
            
            
            echo $name;
            echo " регистрация проша успешно!" . '<br/>';
            echo $back . '<br/>';
            echo "<a href ='./user-panel.php?email=$email'><button>Войти</button></a>";
           
        }
        else{
            echo "Ошибка: " . $connection ->error. '<br/>';
            echo $back;
        }
    }
    }
    



}


