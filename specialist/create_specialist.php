<?php 
require_once 'connect/connect.php';
$fam = $_POST['fam'];
$name = $_POST['name'];
$otchestv19 = $_POST['otchestv19'];
$id_specialnosti = $_POST['id_specialnosti'];
$nomphone = $_POST['nomphone'];
$date = $_POST['date'];




mysqli_query($connect,"INSERT INTO `specialist` (`id_specialist`, `surname`, `name`, `patronymic`,`id_specialization`,`phone`,`birthday` ) VALUES (NULL, '$fam', '$name', '$otchestv19', '$id_specialnosti', '$nomphone', '$date')");
header ('Location: app.php');
?>
