<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="./src/css/style.css" rel="stylesheet" type="text/css" media="all"/>    
    <script src="https://captcha-api.yandex.ru/captcha.js" defer></script>
</head>
<body>
<div class="form">
        <h1 class="titel">Войти<h1>
        <form action="./src/login.php" method="post" class="loginForm">  
            <input type="text" placeholder="EMAIL или телефон " name="login">
            <input type="password" placeholder="Введите пароль" name="password"> 
            <button type="button" class="loginBtn">Войти</button>
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
            <button type="button" class="regBtn">Отправить</button>
        </form>
    </div>

    <div
    class="smart-captcha"
    data-sitekey="ysc1_Pc5BL8D5ew910A722f6HPe65GczkGXB4piQFFwe887745e6f"
    data-hl="ru"
    data-callback="yandex_captcha"
    ></div>


    <!-- скрипт капчи -->
<script>

    function yandex_captcha() {
        let smart_token = document.querySelector('input[name="smart-token"]').value;
        const loginBtn = document.querySelector('.loginBtn')
        const regBtn = document.querySelector('.regBtn')
        // alert
        smart_token !== '' ? (loginBtn.type='submit', regBtn.type='submit') : false
        
    }

</script>
    <!-- скрипт капчи  -->
</body>
</html>