<?php 
require_once 'podkl.php';

$usid = $_POST['usid'];

$idus = $_POST['idus'];
$proz = $_POST['proz'];
$pit1 = $_POST['pit1'];
$eks = $_POST['eks'];
mysqli_query($podkl,"UPDATE `uslugi` SET `kod_stran` = '$idus' , `prozhiv` = '$proz' , `pitanie` = '$pit1' , `eksurs` = '$eks' WHERE `uslugi`.`id` = '$usid'");
header ('Location: add.php');

?>