<?php 
require_once 'podkl.php';
$idusl = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `uslugi` WHERE `uslugi`.`id` = '$idusl'");
header ('Location: add.php');
?>  