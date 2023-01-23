<?php 
require_once 'podkl.php';
$idstrana = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `strana` WHERE `strana`.`id` = '$idstrana'");
header ('Location: add.php');
?>  