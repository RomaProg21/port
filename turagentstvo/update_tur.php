<?php 
require_once 'podkl.php';
$turid = $_GET['id'];
$tur = mysqli_query($podkl,"SELECT * FROM `tur` WHERE `id`='$turid'");
$tur = mysqli_fetch_assoc($tur);
$uslugi= mysqli_query($podkl,"SELECT * FROM `uslugi`");
$uslugi = mysqli_fetch_all($uslugi);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stil.css">
    <style>
        *{
            margin:0 auto;
            justify-content: center;
            align-items: center;

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
            display: flex;
        }
        
    </style>
    <title>Document</title>
</head>
<body>
<form action="update_tur1.php" method="post">
    <input type="hidden" name ="idtur" value="<?= $turid ?>">
    <div>
    <p>Айди услуги:</p>
    <hr>
        <?php
        foreach($uslugi as $usl){
            ?>
            <p>Код страны : <?= $usl[1]?> - Проживание:  <?= $usl[2]?> - Питание :  <?= $usl[3]?> - Экскурсия: <?= $usl[4]?> - Айди: <?= $usl[0]?> </p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idus"  value="<?= $tur['kod_uslugi'] ?>" >
        <p>Дата:</p>
        <input type="date" name="date" value="<?= $tur['date'] ?>"  >
        <p>Цена:</p>
        <input type="text" name="price" value="<?= $tur['price'] ?>" >
        <p>Длительность: </p>
        <input type="text" name="dun" value="<?= $tur['duration'] ?>" >
        <p>Количество людей</p>
        <input type="text" name="kolvo" value="<?= $tur['kolvo'] ?>" >
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>