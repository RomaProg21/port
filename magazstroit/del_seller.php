<?php 
require_once 'config/connect.php';
$seller_id = $_GET['id'];
mysqli_query($mysqli,"DELETE FROM `seller` WHERE `seller`.`seller_code` = '$seller_id'");
header ('Location: index.php');
?>