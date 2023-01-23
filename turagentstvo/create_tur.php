<?php 
require_once 'podkl.php';
$usl1 = $_POST['usl1'];
$date1 = $_POST['date1'];
$price1 = $_POST['price1'];
$duration1 = $_POST['duration1'];
$kolvo1 = $_POST['kolvo1'];




mysqli_query($podkl,"INSERT INTO `tur` (`id`, `kod_uslugi`, `date`, `price` , `duration` , `kolvo` ) VALUES (NULL, '$usl1', '$date1' , '$price1' , '$duration1' , '$kolvo1')");
header ('Location: add.php');
?>
