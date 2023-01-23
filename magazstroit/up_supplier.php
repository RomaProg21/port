<?php 
require_once 'config/connect.php';
$supplierid = $_GET['id'];
$supplier = mysqli_query($mysqli,"SELECT * FROM `supplier` WHERE `supplier_code`='$supplierid'");
$supplier = mysqli_fetch_assoc($supplier);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
<form action="up_supplier1.php" method="post">
    <input type="hidden" name ="id" value="<?= $supplierid ?>">
        <p>Firm_name</p>
        <input type="text" name="firm" value="<?=$supplier['firm_name']?>">
        <p>Country :</p>
        <input type="text" name="country" value="<?=$supplier['country']?>">

        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>