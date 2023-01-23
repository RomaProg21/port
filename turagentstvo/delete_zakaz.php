<?php 
require_once 'podkl.php';
$idzakaz = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `zakaz` WHERE `zakaz`.`id` = '$idzakaz'");
header ('Location: add.php');
?>  