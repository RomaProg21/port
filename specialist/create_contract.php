<?php 
require_once 'connect/connect.php';
$specialist10 = $_POST['specialist10'];
$idpacienta = $_POST['idpacienta'];
$date10 = $_POST['date10'];
$idusl = $_POST['idusl'];


mysqli_query($connect,"INSERT INTO `contract` (`id_contract`, `id_specialist`, `id_pacient`, `date` , `id_usluga`) VALUES (NULL, '$specialist10', '$idpacienta' , '$date10' , '$idusl')");
header ('Location: app.php');
?>
