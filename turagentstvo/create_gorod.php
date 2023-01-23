<?php 
require_once 'podkl.php';
$gorod2 = $_POST['gorod2'];



mysqli_query($podkl,"INSERT INTO `gorod` (`id`, `gorod`) VALUES (NULL, '$gorod2')");
header ('Location: add.php');
?>
