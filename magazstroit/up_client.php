<?php 
require_once 'config/connect.php';
$clientid = $_GET['id'];
$client = mysqli_query($mysqli,"SELECT * FROM `client` WHERE `client_code`='$clientid'");
$client = mysqli_fetch_assoc($client);
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
<form action="up_client1.php" method="post">
    <input type="hidden" name ="id" value="<?= $clientid ?>">
        <p>Organization_name</p>
        <input type="text" name="organiz" value="<?=$client['organization_name']?>">
        <p>Director :</p>
        <input type="text" name="director" value="<?=$client['director']?>">
        <p>Phone</p>
        <input type="text" name="phone" value="<?=$client['phone']?>">
        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>