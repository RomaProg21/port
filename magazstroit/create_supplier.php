<?php 
require_once 'config/connect.php';
$firmname = $_POST['firma'];
$country = $_POST['country1'];
$date1 = (date ("y-m-d H:i:s"));

mysqli_query($mysqli,"INSERT INTO `supplier` (`supplier_code`, `firm_name`, `country`,  `delivery_date`) VALUES (NULL, '$firmname', '$country', '$date1')");
header ('Location: index.php');
?>
