<?php 
require_once 'podkl.php';

$zakazid = $_POST['zakazid'];
$idkl = $_POST['idkl'];
$idtu = $_POST['idtu'];
$date = $_POST['date'];
mysqli_query($podkl,"UPDATE `zakaz` SET `id_klient` = '$idkl' , `id_tur` = '$idtu' , `date` = '$date' WHERE `zakaz`.`id` ='$zakazid'");
header ('Location: add.php');

?>