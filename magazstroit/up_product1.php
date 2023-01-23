<?php 
require_once 'config/connect.php';

$productname = $_POST['productname'];
$des = $_POST['descr'];
$unit = $_POST['unit'];
$guar = $_POST['guar'];
$rem = $_POST['rem'];
$totcost = $_POST['totcost'];
$countr = $_POST['countr'];
$suppliercode = $_POST['suppliercode'];
$id =$_POST['id'];

mysqli_query($mysqli,"UPDATE `product` SET `product_name` = '$productname' ,
 `description` = '$des' , `unit_price` = '$unit' , `guarantee` = '$guar' , `remains` = '$rem' ,
  `total_cost` = '$totcost' , `country` = '$countr' , `supplier_code` = '$suppliercode' 
  WHERE `product`.`product_code` ='$id'");
header ('Location: index.php');

?>