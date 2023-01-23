<?php 
require_once 'config/connect.php';

$organiz = $_POST['organiz'];
$director = $_POST['director'];
$phone = $_POST['phone'];
$id =$_POST['id'];
mysqli_query($mysqli,"UPDATE `client` SET `organization_name` = '$organiz' , `director` = '$director' , `phone` = '$phone'  WHERE `client`.`client_code` ='$id'");
header ('Location: index.php');

?>