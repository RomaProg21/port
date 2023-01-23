<?php 
require_once 'podkl.php';
$gorodid = $_GET['id'];
$gorod = mysqli_query($podkl,"SELECT * FROM `gorod` WHERE `id`='$gorodid'");
$gorod = mysqli_fetch_assoc($gorod);
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
<form action="update_gorod1.php" method="post">
    <input type="hidden" name ="idgorod" value="<?= $gorodid ?>">
    <div>
    <p>Название города:</p>
        <input type="text" name="gorod"  value="<?= $gorod['gorod'] ?>" >
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>