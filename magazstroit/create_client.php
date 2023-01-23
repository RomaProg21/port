<?php 
require_once 'config/connect.php';
$organization = $_POST['organization'];
$director = $_POST['director'];
$phone = $_POST['phone'];

mysqli_query($mysqli,"INSERT INTO `client` (`client_code`, `organization_name`, `director`, `phone`) VALUES (NULL, '$organization', '$director', '$phone')");
header ('Location: index.php');
?>
