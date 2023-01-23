<?php 
require_once 'podkl.php';
$uslugaid = $_GET['id'];
$usluga = mysqli_query($podkl,"SELECT * FROM `uslugi` WHERE `id`='$uslugaid'");
$usluga = mysqli_fetch_assoc($usluga);
$strana= mysqli_query($podkl,"SELECT * FROM `strana`");
$strana = mysqli_fetch_all($strana);


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
<form action="update_usluga1.php" method="post">
    <input type="hidden" name ="usid" value="<?= $uslugaid ?>">
    <div>
    <p>Айди страны:</p>
    <hr>
        <?php
        foreach($strana as $str){
            ?>
            <p>Айди города : <?= $str[1]?> - Страна:  <?= $str[2]?> - Айди :  <?= $str[0]?></p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idus"  value="<?= $usluga['kod_stran'] ?>" >
        <p>Проживание:</p>
        <input type="text" name="proz" value="<?= $usluga['prozhiv'] ?>"  >
        <p>Питание:</p>
        <input type="text" name="pit1" value="<?= $usluga['pitanie'] ?>" >
        <p>Экскурсия: </p>
        <input type="text" name="eks" value="<?= $usluga['eksurs'] ?>" >
        
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>