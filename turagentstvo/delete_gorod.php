<?php 
require_once 'podkl.php';
$idgorod = $_GET['id'];
mysqli_query($podkl,"DELETE FROM `gorod` WHERE `gorod`.`id` = '$idgorod'");
header ('Location: add.php');
?>  