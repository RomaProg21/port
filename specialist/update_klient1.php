<?php 
require_once 'connect/connect.php';

$idklient = $_POST['idklient'];
$fam3 = $_POST['fam3'];
$name3 = $_POST['name3'];
$otchestvo3 = $_POST['otchestvo3'];
$address3 = $_POST['address3'];
$phone3 = $_POST['phone3'];
$date3 = $_POST['date3'];
mysqli_query($connect,"UPDATE `pacient` SET `surname` = '$fam3' , `name` = '$name3' , `patronymic` = '$otchestvo3' , `address` = '$address3' , `phone` = '$phone3' , `dateofbirth` = '$date3' WHERE `pacient`.`id` ='$idklient'");
header ('Location: app.php');

?>