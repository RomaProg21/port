<?php 
require_once 'podkl.php';
$klientid = $_GET['id'];
$klient1 = mysqli_query($podkl,"SELECT * FROM `klient` WHERE `id`='$klientid'");
$klient1 = mysqli_fetch_assoc($klient1);
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
<form action="update_klienta1.php" method="post">
    <input type="hidden" name ="idklient1" value="<?= $klientid ?>">
    <div>
    <p>Фамилия:</p>
        <input type="text" name="fam"  value="<?= $klient1['fam'] ?>" >
        <p>Имя:</p>
        <input type="text" name="name" value="<?= $klient1['name'] ?>"  >
        <p>Отчество:</p>
        <input type="text" name="otch" value="<?= $klient1['otch'] ?>" >
        <p>Паспорт: </p>
        <input type="text" name="passport" value="<?= $klient1['passport'] ?>" >
        <p>Номер телефона</p>
        <input type="text" name="phone" value="<?= $klient1['phone'] ?>" >
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>