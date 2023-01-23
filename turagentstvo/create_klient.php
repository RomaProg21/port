<?php 
require_once 'podkl.php';
$fam = $_POST['fam'];
$nam = $_POST['nam'];
$otch = $_POST['otch'];
$pasp = $_POST['pasp'];
$phone = $_POST['phone'];


mysqli_query($podkl,"INSERT INTO `klient` (`id`, `fam`, `name`, `otch` , `passport` , `phone`) VALUES (NULL, '$fam', '$name' , '$otch' , '$pasp' , '$phone')");
header ('Location: add.php');
?>
