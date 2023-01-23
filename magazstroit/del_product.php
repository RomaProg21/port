<?php 
require_once 'config/connect.php';
$product_id = $_GET['id'];
mysqli_query($mysqli,"DELETE FROM `product` WHERE `product`.`product_code` = '$product_id'");
header ('Location: index.php');
?>