<?php 
require_once 'config/connect.php';
$prdname = $_POST['prdname'];
$despt = $_POST['despt'];
$unitprice1 = $_POST['unitprice1'];
$guarant = $_POST['guarant'];
$remains1 = $_POST['remains1'];
$totcos = $_POST['totcos'];
$country1 = $_POST['country1'];
$supcode = $_POST['supcode'];






// mysqli_query($mysqli, "ALTER TABLE `groups` AUTO_INCREMENT = 1");
mysqli_query($mysqli,"INSERT INTO `product` (`product_code`,
 `product_name`, `description`, `unit_price`,
  `guarantee`, `remains`, `total_cost`, `country`,
   `supplier_code`) VALUES (NULL, '$prdname', '$despt', '$unitprice1',
    '$guarantr', '$remains1', '$totcos', '$country1', '$supcode')");
header ('Location: index.php');
?>
