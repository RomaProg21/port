<?php 
require_once 'connect/connect.php';
$usluga_id = $_GET['id'];
$usluga = mysqli_query($connect,"SELECT * FROM `services` WHERE `id_services`='$usluga_id'");
$usluga = mysqli_fetch_assoc($usluga);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin:0 auto;
            

        }
        input{
            width:380px;
        }
        p{
            margin:0 auto;
            justify-content: center;
            align-items: center;
        }
       
            button{
            margin-top: 15px;
            background-color: white;
    color: black;
    border: 2px solid blue;
        }
        button:hover{
            color:#00BFFF;
            border: 2px solid #00FFFF;	
        }
        form{
        }
        
    </style>
    <title>Document</title>
</head>
<body>
<form action="update_usluga1.php" method="post">
    <input type="hidden" name ="idusluga" value="<?= $usluga_id ?>">
    <p>Название услуги:</p>
    <input type="text"  name="nazv" value="<?= $usluga['name_services'] ?>">
    <p>Цена:</p>
    <input type="text" name="price" value="<?= $usluga['price'] ?>">
        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>