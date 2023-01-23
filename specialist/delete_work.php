<?php 
require_once 'connect/connect.php';
$idwork = $_GET['id'];
mysqli_query($connect,"DELETE FROM `workinghours` WHERE `workinghours`.`id_workinghours` = '$idwork'");
header ('Location: app.php');
?>  