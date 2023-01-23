<?php 
require_once 'config/connect.php';

$firm = $_POST['firm'];
$country = $_POST['country'];
$delivery = (date ("y-m-d H:i:s"));
$id =$_POST['id'];
mysqli_query($mysqli,"UPDATE `supplier` SET `firm_name` = '$firm' , `country` = '$country' , `delivery_date` = '$delivery' WHERE `supplier`.`supplier_code` ='$id'");
header ('Location: index.php');

?>