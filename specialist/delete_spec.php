<?php 
require_once 'connect/connect.php';
$idspec = $_GET['id'];
mysqli_query($connect,"DELETE FROM `specialization` WHERE `specialization`.`id_specialization` = '$idspec'");
header ('Location: app.php');
?>