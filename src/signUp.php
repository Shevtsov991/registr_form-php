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
        <h1 class="titel">Зарегистрироваться<h1>
                <?php if(!empty($_GET['error'])): ?>
                <p><?php echo $_GET['error']?></p>
                <?php endif;?>
        <form action="./register.php" method="post">
            <div class="input-block">
            <input type="text" placeholder="Введите имя" name="name">
            <input type="email" placeholder="Введите EMAIL" name="email">
            <input type="tel" placeholder="Введите телефон" name="tel">
            <input type="password" placeholder="Введите пароль" name="pass">
            <input type="password" placeholder="Повторите пароль" name="repPass">
            </div>
                <div
                    class="smart-captcha"
                    data-sitekey="<Ключ клиента>"
                    data-hl="ru"
                    data-callback="yandex_captcha"
                ></div>
            <button type="submit" class="regBtn">Отправить</button>
        </form>
    </div>
</body>
</html>