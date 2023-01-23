<?php 
require_once 'connect/connect.php';
$idspecialist = $_GET['id'];
mysqli_query($connect,"DELETE FROM `specialist` WHERE `specialist`.`id_specialist` = '$idspecialist'");
header ('Location: app.php');
?>