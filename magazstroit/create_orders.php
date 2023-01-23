<?php 
require_once 'config/connect.php';
$clientcod = $_POST['clientcod'];
$sellercod = $_POST['sellercod'];
$productcod = $_POST['productcod'];
$quanity = $_POST['quanity'];
$result = $_POST['result'];
$date = (date ("y-m-d H:i:s"));







// mysqli_query($mysqli, "ALTER TABLE `groups` AUTO_INCREMENT = 1");
mysqli_query($mysqli,"INSERT INTO `orders` (`orders_code`, `client_code`, `seller_code`, `product_code`, `quanity`, `result`, `order_date`) VALUES (NULL, '$clientcod', '$sellercod', '$productcod', '$quanity', '$result', '$date')");
header ('Location: index.php');
?>