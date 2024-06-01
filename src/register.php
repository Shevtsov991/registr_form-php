<?php
require_once ("db.php");
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
            /*kaptcha */
            // define('SMARTCAPTCHA_SERVER_KEY', '');
            
               
                // function check_captcha($token) {
                //     $ch = curl_init();
                //     $args = http_build_query([
                //         "secret" => SMARTCAPTCHA_SERVER_KEY,
                //         "token" => $token,
                //         "ip" => $_SERVER['REMOTE_ADDR'], // Нужно передать IP пользователя.
                //                                         // Как правильно получить IP зависит от вашего прокси.
                //     ]);
                //     curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
                //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //     curl_setopt($ch, CURLOPT_TIMEOUT, 1);

                //     $server_output = curl_exec($ch);
                //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //     curl_close($ch);

                //     if ($httpcode !== 200) {
                //         echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
                //         return true;
                //     }
                //     $resp = json_decode($server_output);
                //     return $resp->status === "ok";
                // }

                // $token = $_POST['smart-token'];
                // if (check_captcha($token)) {
                //     echo "Passed\n";
                // } else {
                //     echo "Robot\n";
                // }
            /*kaptcha */

        }
        else{
            echo "Ошибка: " . $connection ->error. '<br/>';
            echo $back;
        }
    }
    }
    



}


