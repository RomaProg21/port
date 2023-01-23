<?php 
require_once 'podkl.php';
$idstrana5 = $_POST['idstrana5'];
$proziv = $_POST['proziv'];
$pitanie = $_POST['pitanie'];
$ekskursia = $_POST['ekskursia'];




mysqli_query($podkl,"INSERT INTO `uslugi` (`id`, `kod_stran`, `prozhiv`, `pitanie` , `eksurs`) VALUES (NULL, '$idstrana5', '$proziv' , '$pitanie' , '$ekskursia')");
header ('Location: add.php');
?>
