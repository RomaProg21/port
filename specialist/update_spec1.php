<?php 
require_once 'connect/connect.php';

$idspec = $_POST['idspec'];
$nazvspecial = $_POST['nazvspecial'];
mysqli_query($connect,"UPDATE `specialization` SET `name_specialization` = '$nazvspecial' WHERE `specialization`.`id_specialization` ='$idspec'");
header ('Location: app.php');

?>