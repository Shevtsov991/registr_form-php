<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="./src/css/style.css" rel="stylesheet" type="text/css" media="all"/>  
</head>
<body>
     <?php
    
    // require_once('./src/db.php');
    // $sql ="CREATE DATABASE registerUsers";
    // if ($connection -> query($sql)) {
    //     echo "Успешно";
    // }else{
    //     echo "Ошибка: " . $conn->error;
    // }
    ?> 
<div class="form">
        <h1 class="titel">Войти<h1>
        <form action="./src/login.php" method="post">  
            <input type="text" placeholder="EMAIL или телефон " name="login">
            <input type="password" placeholder="Введите пароль" name="password"> 
            <button type="submit" >Войти</button>
        </form>
    </div>
 
    <div class="form">
        <h1 class="titel">Зарегистрироваться<h1>
        <form action="./src/register.php" method="post">
            <div class="input-block">
            <input type="text" placeholder="Введите имя" name="name">
            <input type="email" placeholder="Введите EMAIL" name="email">
            <input type="tel" placeholder="Введите телефон" name="tel">
            <input type="password" placeholder="Введите пароль" name="pass">
            <input type="password" placeholder="Повторите пароль" name="repPass">
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>

        <div;
            style="height: 100px";
            id="captcha-container";
            class="smart-captcha";
            data-sitekey="ysc1_Pc5BL8D5ew910A722f6HPe65GczkGXB4piQFFwe887745e6f";
        ></div>;

</body>
</html>