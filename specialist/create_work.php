<?php 
require_once 'connect/connect.php';
$hours1 = $_POST['hours1'];
$day1 = $_POST['day1'];
$idspecialista1 = $_POST['idspecialista1'];

mysqli_query($connect,"INSERT INTO `workinghours` (`id_workinghours`, `hours`, `id_schedule`,`id_specialist`) VALUES (NULL, '$hours1', '$day1', '$idspecialista1')");
header ('Location: app.php');
?>
