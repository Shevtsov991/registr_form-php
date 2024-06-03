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
            <?php if(!empty($_GET['error'])): ?>
                <p><?php echo $_GET['error']?></p>
                <?php endif;?>
        <form action="./login.php" method="post" class="loginForm">  
            <input type="text" placeholder="EMAIL или телефон " name="login">
            <input type="password" placeholder="Введите пароль" name="password"> 
            <div
                class="smart-captcha"
                data-sitekey="<Ключ клиента>"
                data-hl="ru"
                data-callback="yandex_captcha"
            ></div>
            <button type="submit" class="loginBtn">Войти</button>
        </form>
    </div>

</body>
</html>