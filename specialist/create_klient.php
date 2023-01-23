<?php 
require_once 'connect/connect.php';
$fam1 = $_POST['fam1'];
$name1 = $_POST['name1'];
$otchestvo1 = $_POST['otchestvo1'];
$address = $_POST['address'];
$nomphone1 = $_POST['nomphone1'];
$date1 = $_POST['date1'];

mysqli_query($connect,"INSERT INTO `pacient` (`id`, `surname`, `name`, `patronymic` , `address`, `phone`, `dateofbirth`) VALUES (NULL, '$fam1', '$name1' , '$otchestvo1' , '$address' , '$nomphone1' , '$date1')");
header ('Location: app.php');
?>
