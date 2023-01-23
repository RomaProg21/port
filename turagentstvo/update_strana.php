<?php 
require_once 'podkl.php';
$stranaid = $_GET['id'];
$strana = mysqli_query($podkl,"SELECT * FROM `strana` WHERE `id`='$stranaid'");
$strana = mysqli_fetch_assoc($strana);
$gorod= mysqli_query($podkl,"SELECT * FROM `gorod`");
$gorod = mysqli_fetch_all($gorod);
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
<form action="update_strana1.php" method="post">
    <input type="hidden" name ="idstrana" value="<?= $stranaid ?>">
    <div>
    <p>Айди города:</p>
    <hr>
        <?php
        foreach($gorod as $gorod3){
            ?>
            <p>Город : <?= $gorod3[1]?> - Айди:  <?= $gorod3[0]?></p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idgorod"  value="<?= $strana['kod_goroda'] ?>" >
    <p>Страна:</p>
        <input type="text" name="strana"  value="<?= $strana['name_strana'] ?>" >
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>