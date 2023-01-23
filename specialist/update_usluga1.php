<?php 
require_once 'connect/connect.php';

$idusluga = $_POST['idusluga'];
$nazv = $_POST['nazv'];
$price = $_POST['price'];
mysqli_query($connect,"UPDATE `services` SET `name_services` = '$nazv' , `price` = '$price' WHERE `services`.`id_services` ='$idusluga'");
header ('Location: app.php');

?>