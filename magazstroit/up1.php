<?php 
require_once 'config/connect.php';
$surname = $_POST['surname'];
$name = $_POST['name'];
$patrn = $_POST['patronumic'];
$gender = $_POST['gender'];
$birthdate = (date ("y-m-d H:i:s"));
$passport = $_POST['passord_data'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$id =$_POST['id'];
mysqli_query($mysqli,"UPDATE `seller` SET `surname` = '$surname' , `name` = '$name' , `patronymic` = '$patrn' , `gender` = '$gender' , `birthdate` = '$birthdate' , `passport_data` = '$passport' , `address` = '$address' , `phone` = 'phone'  WHERE `seller`.`seller_code` ='$id'");
header ('Location: index.php');
?>