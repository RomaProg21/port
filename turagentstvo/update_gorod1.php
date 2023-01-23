<?php 
require_once 'podkl.php';

$idgorod = $_POST['idgorod'];
$gorod = $_POST['gorod'];
mysqli_query($podkl,"UPDATE `gorod` SET `gorod` = '$gorod' WHERE `gorod`.`id` ='$idgorod'");
header ('Location: add.php');

?>