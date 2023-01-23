<?php 
require_once 'config/connect.php';
$orders_id = $_GET['id'];
mysqli_query($mysqli,"DELETE FROM `orders` WHERE `orders`.`orders_code` = '$orders_id'");
header ('Location: index.php');
?>