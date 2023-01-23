<?php 
require_once 'connect/connect.php';

$idcontract = $_POST['idcontract'];
$specialist10 = $_POST['specialist10'];
$idpacienta = $_POST['idpacienta'];
$date10 = $_POST['date10'];
$idusluga = $_POST['idusluga'];
mysqli_query($connect,"UPDATE `contract` SET `id_specialist` = '$specialist10' , `id_pacient` = '$idpacienta', `date` = '$date10' , `id_services` ='$idusluga' WHERE `contract`.`id_contract` ='$idcontract'");
header ('Location: app.php');

?>