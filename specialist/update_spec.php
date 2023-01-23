<?php 
require_once 'connect/connect.php';
$spec_id = $_GET['id'];
$specialization = mysqli_query($connect,"SELECT * FROM `specialization` WHERE `id_specialization`='$spec_id'");
$specialization = mysqli_fetch_assoc($specialization);

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
<form action="update_spec1.php" method="post">
    <input type="hidden" name ="idspec" value="<?= $spec_id ?>">
    <p>название специальности:</p>
    <input type="text"  name="nazvspecial" value="<?= $specialization['name_specialization'] ?>">
  
        <button type="submit">Изменить</button>
    </form>
    
</body>
</html>