<?php 
require_once 'connect/connect.php';
$klient_id = $_GET['id'];
$klient = mysqli_query($connect,"SELECT * FROM `pacient` WHERE `id`='$klient_id'");
$klient = mysqli_fetch_assoc($klient);
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
            display: flex;
        }
        
    </style>
    <title>Document</title>
</head>
<body>
<form action="update_klient1.php" method="post">
    <input type="hidden" name ="idklient" value="<?= $klient_id ?>">
    <div>
    <p>Фамилия:</p>
        <input type="text" name="fam3"  value="<?= $klient['surname'] ?>" >
        <p>Имя:</p>
        <input type="text" name="name3" value="<?= $klient['name'] ?>"  >
        <p>Отчество:</p>
        <input type="text" name="otchestvo3" value="<?= $klient['patronymic'] ?>" >
        <p>Адрес</p>
        <input type="text" name="address3" value="<?= $klient['address'] ?>" >
        <p>Номер телефона</p>
        <input type="text" name="phone3" value="<?= $klient['phone'] ?>" >
        <p>Дата рождения</p>
        <input type="text" name="date3" value="<?= $klient['dateofbirth'] ?>" >
        <button type="submit">Изменить</button>
    </form>
    </div>
    
</body>
</html>