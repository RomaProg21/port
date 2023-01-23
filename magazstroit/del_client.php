<?php 
require_once 'config/connect.php';
$client_id = $_GET['id'];
mysqli_query($mysqli,"DELETE FROM `client` WHERE `client`.`client_code` = '$client_id'");
header ('Location: index.php');
?>