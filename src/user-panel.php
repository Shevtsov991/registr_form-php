<?php
require_once ("db.php");

if(isset($_GET["id"])){
$userid = str_replace("'",'' ,$_GET["id"]);
$sql = "SELECT * FROM `users` WHERE id = '$userid' ";
}else if(isset($_GET["email"])){
$getEmail = $_GET["email"];
$sql = "SELECT * FROM `users` WHERE  Email = '$getEmail'";

}




$result = $connection -> query($sql);
$row = $result ->fetch_assoc();

$name = $row['userName'];
$tel = $row['tel'];
$email = $row['Email'];
$pass = $row['password'];
$userid =$row['id']



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница пользователя</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>  
</head>
<body>

 
    <div class="form">
        <h1 class="titel">Добро пожаловать <?php echo $name;?><h1>
        <h2 class="titel">Изменить данные</h2>
            <?php if(!empty($_GET['data'])): ?>
            <p><?php echo "Данные изменены!"?></p>  
            <?php endif?>
        <form action="./update.php" method="get">
            <div class="input-block">
            <input type="text" placeholder="Введите имя" name="name" value="<?php echo $name;?>">
            <input type="email" placeholder="Введите EMAIL" name="email" value="<?php echo $email;?>">
            <input type="tel" placeholder="Введите телефон" name="tel" value="<?php echo $tel;?>">
            <input type="password" placeholder="Введите пароль" name="pass"value="<?php echo $pass;?>">
            
            <input type="text" name="id" style="display:none;" value="<?php echo $userid;?>" >
        
            </div>
            <button type="submit" class="btn">Отправить</button>
        </form>
        <a href= "../index.php"><button class="btn">На главную</button></a>
    </div>


</body>
</html>