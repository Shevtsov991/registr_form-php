<?php
require_once ("db.php");

$name = $_GET['name'];
$email = $_GET['email'];
$tel = $_GET['tel'];
$userid =$_GET['id'] ;
$pass = $_GET["pass"];


  
$sql = "UPDATE users SET userName = '$name', Email = '$email', tel = '$tel' WHERE id = '$userid'";

$connection ->query($sql);

 header("location: ./user-panel.php?id='$userid'");
