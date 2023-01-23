<?php 
require_once 'podkl.php';
$idtur = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `tur` WHERE `tur`.`id` = '$idtur'");
header ('Location: add.php');
?>  