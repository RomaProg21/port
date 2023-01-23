<?php 
require_once 'podkl.php';
$idklienta10 = $_POST['idklienta10'];
$idtura10 = $_POST['idtura10'];
$date10 = $_POST['date10'];



mysqli_query($podkl,"INSERT INTO `zakaz` (`id`, `id_klient`, `id_tur`, `date` ) VALUES (NULL, '$idklienta10', '$idtura10' , '$date10')");
header ('Location: add.php');
?>
