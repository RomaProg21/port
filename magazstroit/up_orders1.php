<?php 
require_once 'config/connect.php';

$clientcod = $_POST['clientcod'];
$sellercod = $_POST['sellercod'];
$productcod = $_POST['productcod'];
$quanity = $_POST['quanity'];
$result = $_POST['result'];
$date = (date ("y-m-d H:i:s"));
$id =$_POST['id'];
mysqli_query($mysqli,"UPDATE `orders` SET `client_code` = '$clientcod' , `seller_code` = '$sellercod' , `product_code` = '$productcod' , `quanity` = '$quanity' , `result` = '$result' , `order_date` = '$date'  WHERE `orders`.`orders_code` ='$id'");
header ('Location: index.php');

?>