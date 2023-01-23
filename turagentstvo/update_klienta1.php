<?php 
require_once 'podkl.php';

$idklient1 = $_POST['idklient1'];
$fam = $_POST['fam'];
$name = $_POST['name'];
$otch = $_POST['otch'];
$passport = $_POST['passport'];
$phone = $_POST['phone'];
mysqli_query($podkl,"UPDATE `klient` SET `fam` = '$fam' , `name` = '$name' , `otch` = '$otch' , `passport` = '$passport' , `phone` = '$phone'  WHERE `klient`.`id` ='$idklient1'");
header ('Location: add.php');

?>