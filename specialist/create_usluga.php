<?php 
require_once 'connect/connect.php';
$nameusl = $_POST['nameusl'];
$price = $_POST['price'];
mysqli_query($connect,"INSERT INTO `services` (`id_services`, `name_services`, `price`) VALUES (NULL, '$nameusl', '$price')");
header ('Location: app.php');
?>
