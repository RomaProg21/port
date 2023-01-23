<?php 
require_once 'podkl.php';

$idstrana = $_POST['idstrana'];
$idgorod = $_POST['idgorod'];
$strana = $_POST['strana'];
mysqli_query($podkl,"UPDATE `strana` SET `kod_goroda` = '$idgorod' , `name_strana` = '$strana' WHERE `strana`.`id` ='$idstrana'");
header ('Location: add.php');

?>