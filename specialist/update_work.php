<?php 
require_once 'connect/connect.php';
$work_id = $_GET['id'];
$work = mysqli_query($connect,"SELECT * FROM `workinghours` WHERE `id_workinghours`='$work_id'");
$work = mysqli_fetch_assoc($work);
$specialist= mysqli_query($connect,"SELECT * FROM `specialist`");
$specialist = mysqli_fetch_all($specialist);
$day= mysqli_query($connect,"SELECT * FROM `schedule`");
$day = mysqli_fetch_all($day);

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
            border:2px solid teal;
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
<form action="update_work1.php" method="post">
    <input type="hidden" name ="idwork" value="<?= $work_id ?>">
    <p>Часы работы : </p>
    <input type="text"  name="hours" value="<?= $work['hours'] ?>">
    <p>Айди дня недели: </p>
    <div class="select">
        <select  name="idday"  id="format">
            <option selected disabled>Выберите день недели</option>
            <?php foreach($day as $d1){

            
              ?>
            <option value="<?=$d1[0] ?>"><?= $d1[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
   
    <p>Айди специалиста: </p>
    <div class="select">
        <select  name="idspecial"  id="format">
            <option selected disabled>Выберите специалиста</option>
            <?php foreach($specialist as $spc9){

            
              ?>
            <option  value="<?=$spc9[0] ?>"><?= $spc9[1]?> <?= $spc9[2]?> <?= $spc9[3]?></option>
            <?php
            }
            ?>
        </select>
        </div>

        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>