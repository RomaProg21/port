<?php 
require_once 'config/connect.php';
$supplier_id = $_GET['id'];
mysqli_query($mysqli,"DELETE FROM `supplier` WHERE `supplier`.`supplier_code` = '$supplier_id'");
header ('Location: index.php');
?>