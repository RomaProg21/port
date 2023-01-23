<?php 
require_once 'connect/connect.php';

$idspecialist = $_POST['idspecialist'];
$fam = $_POST['fam'];
$name = $_POST['name'];
$otchestv19 = $_POST['otchestv19'];
$id_specialnosti = $_POST['id_specialnosti'];
$nomphone = $_POST['nomphone'];
$date = $_POST['date'];

mysqli_query($connect,"UPDATE `specialist` SET `surname` = '$fam' , `name` = '$name' , `patronymic` = '$otchestv19' , `id_specialization` = '$id_specialnosti' , `phone` = '$nomphone' , `birthday` = '$date' WHERE `specialist`.`id_specialist` ='$idspecialist'");
header ('Location: app.php');

?>