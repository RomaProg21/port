<?php 
require_once 'connect/connect.php';
$specialist_id = $_GET['id'];
$specialist = mysqli_query($connect,"SELECT * FROM `specialist` WHERE `id_specialist`='$specialist_id'");
$specialist = mysqli_fetch_assoc($specialist);
$spec= mysqli_query($connect,"SELECT * FROM `specialization`");
$spec = mysqli_fetch_all($spec);
$uslugi= mysqli_query($connect,"SELECT * FROM `services`");
$uslugi = mysqli_fetch_all($uslugi);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
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
        input{
  width: 100%;
  max-width: 380px;
  border-radius: 3px;
  overflow: hidden;
        }
     table{
        width: 80%;
     }
th{
    background: #2F4F4F	;
    color:#fff;
}
td{
    background: #eee;
}
td{
    font-size: 18px;
}
button{
    margin:0 auto;
    margin-top:15px;
}
select {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance:none;
   outline:0;
   box-shadow:none;
   border:0!important;
   border: 2px solid teal;
   background-image: none;
   flex: 1;
   padding: 0 .3em;
   color:#aaa;
   cursor:pointer;
   font-size: 1em;
   font-family: 'Open Sans', sans-serif;
}
select::-ms-expand {
   display: none;
}
.select {
   position: relative;
   display: flex;
   width: 16em;
   height: 3em;
   line-height: 3;
   background: teal;
   overflow: hidden;
   border-radius: .25em;
   margin:5px 0px 15px;
}
.select::after {
   content: '\25BC';
   position: absolute;
   top: 0;
   right: 0;
   padding: 0 1em;
   background: #2b2e2e;
   cursor:pointer;
   pointer-events:none;
   transition:.25s all ease;
}
.select:hover::after {
   color: #23b499;
}
th,td{
    font-size: 18px;
}
tr{
    border-bottom:1px solid teal;
  
    
}

    </style>
    <title>Document</title>
</head>
<body>
<form action="update_specialist1.php" method="post">
    <input type="hidden" name ="idspecialist" value="<?= $specialist_id ?>">
    
    <p>Фамилия:</p>
        <input type="text" name="fam"  value="<?= $specialist['surname'] ?>" >
        <p>Имя:</p>
        <input type="text" name="name" value="<?= $specialist['name'] ?>"  >
        <p>Отчество:</p>
        <input type="text" name="otchestv19" value="<?= $specialist['patronymic'] ?>" >
        <p>Айди специальности</p>
        <div class="select">
        <select  name="id_specialnosti"  id="format">
            <option selected disabled>Выберите специалиста</option>
            <?php foreach($spec as $spec21){

            
              ?>
            <option value="<?=$spec21[0] ?>"><?= $spec21[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
        
        <p>Номер телефона</p>
        <input type="text" name="nomphone" value="<?= $specialist['phone'] ?>" >
        <p>Дата рождения</p>
        <input type="text" name="date" value="<?= $specialist['birthday'] ?>" >
    
        
 
        <button type="submit">Изменить</button>
    </form>
    
</body>
</html>