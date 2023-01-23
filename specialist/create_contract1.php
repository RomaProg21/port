<?php 
require_once 'connect/connect.php';
$specialist10 = $_POST['specialist10'];
$idpacienta = $_POST['idpacienta'];
$date10 = $_POST['date10'];

$query = mysqli_query($connect,"SELECT * FROM `specialist` WHERE `id_specialist` = $specialist10");
$query = mysqli_fetch_assoc($query);
$spec = $query['id_specialization'];
$specialization = mysqli_query($connect,"SELECT * FROM `svyz` WHERE `id_specialization` = $spec");
$specialization = mysqli_fetch_all($specialization);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
<form action="create_contract.php" method="post">
<p>Выберите услугу</p>
<div class="select">
        <select  name="idusl"  id="format">
            <option selected disabled>Выберите услугу</option>
            <?php foreach($specialization as $spec1){

            
              ?>
            <option value="<?=$spec1[1] ?>"><?php
            
            $usl = $spec1[1];
            $usl1 = mysqli_query($connect,"SELECT * FROM `services` WHERE `id_services` = $usl");
            $usl1 = mysqli_fetch_all($usl1);
            
            foreach ($usl1 as $usluga1){
                
            ?><?=$usluga1[1] ?> <?php } ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <input type="hidden" value="<?= $specialist10?>" name="specialist10">
        <input type="hidden" value="<?= $idpacienta?>" name="idpacienta">
        <input type="hidden" value="<?= $date10?>" name="date10">

            <button type="submit">Добавить</button>
</form>
    
</body>
</html>
