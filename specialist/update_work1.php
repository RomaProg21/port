<?php 
require_once 'connect/connect.php';

$idwork = $_POST['idwork'];
$hours = $_POST['hours'];
$idday = $_POST['idday'];
$idspecial = $_POST['idspecial'];

mysqli_query($connect,"UPDATE `workinghours` SET `hours` = '$hours' , `id_schedule` = '$idday' , `id_specialist` = '$idspecial' WHERE `workinghours`.`id_workinghours` ='$idwork'");
header ('Location: app.php');

?>