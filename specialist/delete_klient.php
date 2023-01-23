<?php 
require_once 'connect/connect.php';
$idpacient = $_GET['id'];
mysqli_query($connect,"DELETE FROM `pacient` WHERE `pacient`.`id` = '$idpacient'");
header ('Location: app.php');
?>