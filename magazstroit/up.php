<?php 
require_once 'config/connect.php';
$sellerid = $_GET['id'];
$seller = mysqli_query($mysqli,"SELECT * FROM `seller` WHERE `seller_code`='$sellerid'");
$seller = mysqli_fetch_assoc($seller);
// $groups = mysqli_query($mysqli,"SELECT * FROM `groups`");
// $groups =mysqli_fetch_all($groups);

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
<form action="up1.php" method="post">
    <input type="hidden" name ="id" value="<?= $sellerid ?>">
        <p>Surname</p>
        <input type="text" name="surname" value="<?=$seller['surname']?>">
        <p>Name :</p>
        <input type="text" name="name" value="<?=$seller['name']?>">
        <p>Patronumic</p>
        <input type="text" name="patronumic" value="<?=$seller['patronymic']?>">
        <p>Gender</p>
        <input type="text" name="gender" value="<?=$seller['gender']?>">
        <p>Passord_data</p>
        <input type="text" name="passord_data" value="<?=$seller['passport_data']?>">
        <p>Address</p>
        <input type="text" name="address" value="<?=$seller['address']?>">
        <p>Phone</p>
        <input type="text" name="phone" value="<?=$seller['phone']?>">
        
        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>