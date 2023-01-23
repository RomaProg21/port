<?php 
require_once 'config/connect.php';
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$gender = $_POST['gender'];
$passport = $_POST['passport'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = (date ("y-m-d H:i:s"));







// mysqli_query($mysqli, "ALTER TABLE `groups` AUTO_INCREMENT = 1");
mysqli_query($mysqli,"INSERT INTO `seller` (`seller_code`, `surname`, `name`, `patronymic`, `gender`, `birthdate`, `passport_data`, `address`, `phone`) VALUES (NULL, '$surname', '$name', '$patronymic', '$gender', '$date', '$passport', '$address', '$phone')");
header ('Location: index.php');
?>
