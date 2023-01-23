<?php 
require_once 'connect/connect.php';
$nazvspec = $_POST['nazvspec'];
mysqli_query($connect,"INSERT INTO `specialization` (`id_specialization`, `name_specialization`) VALUES (NULL, '$nazvspec')");
header ('Location: app.php');
?>
