<?php 
require_once 'podkl.php';
$zakazid = $_GET['id'];
$zakaz = mysqli_query($podkl,"SELECT * FROM `zakaz` WHERE `id`='$zakazid'");
$zakaz = mysqli_fetch_assoc($zakaz);
$klient= mysqli_query($podkl,"SELECT * FROM `klient`");
$klient = mysqli_fetch_all($klient);
$tur= mysqli_query($podkl,"SELECT * FROM `tur`");
$tur = mysqli_fetch_all($tur);
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
<form action="update_zakaz1.php" method="post">
    <input type="hidden" name ="zakazid" value="<?= $zakazid ?>">
    <div>
    <p>Айди клиента:</p>
    <?php
        foreach($klient as $kli){
            ?>
            <p>Фамилия : <?= $kli[1]?> - Имя:  <?= $kli[2]?> - Отчество :  <?= $kli[3]?> - Айди: <?= $kli[0]?> </p>
            <?php
        }
        ?>
        <input type="text" name="idkl"  value="<?= $zakaz['id_klient'] ?>" >
        <p>Айди тура:</p>
        <hr>
        <?php
        foreach($tur as $t){
            ?>
            <p>Длительность : <?= $t[4]?> - Дата:  <?= $t[2]?> - Цена :  <?= $t[3]?> - Айди: <?= $t[0]?> </p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idtu" value="<?= $zakaz['id_tur'] ?>"  >
        <p>Дата:</p>
        <input type="date" name="date" value="<?= $zakaz['date'] ?>" >
       
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>