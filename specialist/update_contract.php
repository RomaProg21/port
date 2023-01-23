<?php 
require_once 'connect/connect.php';
$contract_id = $_GET['id'];
$contract = mysqli_query($connect,"SELECT * FROM `contract` WHERE `id_contract`='$contract_id'");
$contract = mysqli_fetch_assoc($contract);
$klient1 = mysqli_query($connect,"SELECT * FROM `pacient`");
$klient1 = mysqli_fetch_all($klient1);
$day= mysqli_query($connect,"SELECT * FROM `schedule`");
$day = mysqli_fetch_all($day);
$specialist= mysqli_query($connect,"SELECT * FROM `specialist`");
$specialist = mysqli_fetch_all($specialist);
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
        }
        
    </style>
    
    <title>Document</title>
</head>
<body>
<form action="update_contract1.php" method="post">
<input type="hidden" name ="idcontract" value="<?= $contract_id ?>">

<p>Айди специалиста:</p>
        <hr>
        <?php
        foreach($specialist as $speciali){
            ?>
            <p>Фамилия : <?= $speciali[1]?> - Имя:  <?= $speciali[2]?> - Отчество :  <?= $speciali[3]?> - Айди : <?= $speciali[0]?></p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="specialist10" value="<?= $contract['id_specialist'] ?>">
        <p>Айди пациента:</p>
        <hr>
        <?php
        foreach($klient1 as $con1){
            ?>
            <p>Фамилия : <?= $con1[1]?> - Имя:  <?= $con1[2]?> - Отчество :  <?= $con1[3]?> - Айди : <?= $con1[0]?></p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idpacienta" value="<?= $contract['id_pacient'] ?>">
        
        <p>Дата:</p>
        <input type="text" name="date10" value="<?= $contract['date'] ?>">
        <p>Название услуги</p>
        <hr>
        <?php
        foreach($specialist as $u){
            ?>
            <p>Услуга : <?= $u[7]?> -   <?= $u[8]?>   <?= $u[1]?>  <?= $u[2]?>  <?= $u[3]?></p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idusluga" value="<?= $contract['id_services'] ?>">



        <button type="submit">Обновить</button>

    </form>
    </div>
    
</body>
</html>