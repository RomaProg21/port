<?php 
require_once 'podkl.php';
$idklient1 = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `klient` WHERE `klient`.`id` = '$idklient1'");
header ('Location: add.php');
?>  