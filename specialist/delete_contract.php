<?php 
require_once 'connect/connect.php';
$idcontract = $_GET['id'];
mysqli_query($connect,"DELETE FROM `contract` WHERE `contract`.`id_contract` = '$idcontract'");
header ('Location: app.php');
?>