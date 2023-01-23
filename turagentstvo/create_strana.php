<?php 
require_once 'podkl.php';
$idgorod3 = $_POST['idgorod3'];
$strana3 = $_POST['strana3'];





mysqli_query($podkl,"INSERT INTO `strana` (`id`, `kod_goroda`, `name_strana`) VALUES (NULL, '$idgorod3', '$strana3')");
header ('Location: add.php');
?>
