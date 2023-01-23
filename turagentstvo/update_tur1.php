<?php 
require_once 'podkl.php';

$idtur = $_POST['idtur'];

$idus = $_POST['idus'];
$date = $_POST['date'];
$price = $_POST['price'];
$dun = $_POST['dun'];
$kolvo = $_POST['kolvo'];
mysqli_query($podkl,"UPDATE `tur` SET `kod_uslugi` = '$idus' , `date` = '$date' , `price` = '$price' , `duration` = '$dun' , `kolvo` = '$kolvo' WHERE `tur`.`id` = '$idtur'");
header ('Location: add.php');

?>