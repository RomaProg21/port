<?php 
require_once 'connect/connect.php';
$idusluga = $_GET['id'];
mysqli_query($connect,"DELETE FROM `services` WHERE `services`.`id_services` = '$idusluga'");
header ('Location: app.php');
?>