<?php 
require_once 'connect/connect.php';
$uslugi= mysqli_query($connect,"SELECT * FROM `services`"); //запрос на получение данных из таблицы services
$uslugi = mysqli_fetch_all($uslugi);  // получуение всех данных из строк таблицы в виде ассоциативного массива для использования вывода этих данных нужно использовать foreach
$spec= mysqli_query($connect,"SELECT * FROM `specialization`");
$spec = mysqli_fetch_all($spec);
$specialist= mysqli_query($connect,"SELECT * FROM `specialist`");
$specialist = mysqli_fetch_all($specialist);
$klient= mysqli_query($connect,"SELECT * FROM `pacient`");
$klient = mysqli_fetch_all($klient);
$contract= mysqli_query($connect,"SELECT * FROM `contract`");
$contract = mysqli_fetch_all($contract);
$day= mysqli_query($connect,"SELECT * FROM `schedule`");
$day = mysqli_fetch_all($day);
$daywork= mysqli_query($connect,"SELECT * FROM `workinghours`");
$daywork = mysqli_fetch_all($daywork);
$fil2 = mysqli_query($connect,"SELECT *
FROM `schedule`
WHERE `id_schedule` = 1");
$fil2 = mysqli_fetch_all($fil2);  
  $fil3 = mysqli_query($connect,"SELECT *
FROM `schedule`
WHERE `id_schedule` = 1"); // WHERE - где , то есть где айди такой , получим все данные по нему(айди)
$fil3 = mysqli_fetch_assoc($fil3);  // получение данных в виде имен таблиц по определенному айди 
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- подключение своих стилей(находятся в папке style.css) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- //подключение стилей буцтрап(библиотека стилей) -->
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
   color: black;
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
   background: orangered;
   overflow: hidden;
   border-radius: .5em;
   margin:5px 0px 15px;
}
.select::after {
   content: '\25BC';
   position: absolute;
   top: 0;
   right: 0;
   padding: 0 1em;
   background: orangered;
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
input{
    margin:0px 0px 10px 0px;
}
p{
    margin:0px;
}
    </style>
    <title>Document</title>
</head>
<body>
        <div id="container"> 
            <!-- этот див с айди контейнер нужен для фреймоврка vue , который отвечает за открытие и закрытие кнопок -->
            
    <h1 style="display:flex;align-items:center;justify-content:center;">Стоматологическая поликлиника</h1>
    <button @click="pokaz=!pokaz">Услуги</button> 
    <!-- По нажатию на кнопку переменная показ меняется с false(потому что изначально мы задали ее false) на true и так каждый раз они меняются по нажатию -->
    <!-- Таблица услуги -->
    <div v-show="pokaz">
        <!-- по нажатию на кнопку услуги этот див показывает все что находится в div если pokaz=true  -->
    <table>
            <tr>
                <th>id</th>
                <th>Название услуги</th>
            <th>Цена</th>
            <th>Изменить</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($uslugi as $usl){
                //Метод форич проходится по переменной где функция mysqli_fetch_all по созданной нам переменной $usl 
                //И с помощью этой переменной мы можем обращаться к элементам массива

            
            ?>
            <tr>
                <td><?= $usl[0] ?></td>
                <td><?= $usl[1] ?></td>
                <td><?= $usl[2] ?></td>
                <td><a style="color:blue;" href="update_usluga.php?id=<?= $usl[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
    <!-- Передача айди в ссылку update_usluga.php для последующей с ней работы, нужно для того, чтобы изменять определенный выбранный нами столбец таблицы по определенному айди -->
    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
    </svg></a></td>
                <td><a style="color:red;" href="delete_usluga.php?id=<?= $usl[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>
    <!-- Тоже самое, но с удалением -->

            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить новую услугу</h1>
        <form action="create_usluga.php" method="post">
            <!-- тег форма с атрибутом action и методом post нужна для передачи данных с input в этой форме в файл , который мы написаали в атрибуте action -->
            <p> Название услуги:</p>
            <input type="text" name="nameusl">
            <!-- В каждом инпуте в форме есть атрибут name , он нужен для передачи данных именно с этого инпута , name должны быть разными -->
            <p>Цена:</p>
            <input type="text" name="price">

            <button type="submit">Добавить</button>
            <!-- Кнопка button с атрибутом type=submin - это отправка данных в файл action -->

        </form>
        </div>
        <button @click="pokaz1=!pokaz1">Специальность</button>
        <div v-show="pokaz1">
        <table>
            <tr>
                <th>id</th>
                <th>Название специальности</th>
            <th>Изменить</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($spec as $spc){

            
            ?>
            <tr>
                <td><?= $spc[0] ?></td>
                <td><?= $spc[1] ?></td>
                <td><a style="color:blue;" href="update_spec.php?id=<?= $spc[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
    </svg></a></td>
                <td><a style="color:red;" href="delete_spec.php?id=<?= $spc[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>

            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить новую специальность</h1>
        <form action="create_spec.php" method="post">
            <p>Название специальности:</p>
            <input type="text" name="nazvspec">
        
            <button type="submit">Добавить</button>

        </form>

        </div>

    <button @click="pokaz2=!pokaz2">Специалист</button>

        <div v-show="pokaz2">
        <table>
            <tr>
                <th>id</th>
                <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Телефон</th>
            <th>Дата рождения</th>
            <th>Специальность</th>
            <th>Услуги</th>
            <th>Изменить</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($specialist as $specialis){

            
            ?>
            <tr>
                <td><?= $specialis[0] ?></td>
                <td><?= $specialis[1] ?></td>
                <td><?= $specialis[2] ?></td>
                <td><?= $specialis[3] ?></td>
                <td><?= $specialis[5] ?></td>
                <td><?= $specialis[6] ?></td>       
                <td><?php
                $fff = mysqli_query($connect,"SELECT * FROM `specialization` WHERE `id_specialization` = $specialis[4]");
                $fff = mysqli_fetch_assoc($fff);
                //По запросу мы получаем с таблицы специальностей название специальности ниже
                ?>
                <?= $fff['name_specialization'] ?> </td>
                <td><?php
                $n1 = mysqli_query($connect,"SELECT * FROM `svyz` WHERE `id_specialization` = $specialis[4]");
                $n1 = mysqli_fetch_all($n1);
                //svyz - промежуточная таблица , где связаны айди специальности и айди услуги , по запросу получаем данные о услугах где айди специальности равен specialis[4]
               
                foreach ($n1 as $nnn1){
                    $nnn = $nnn1[1];
                    //Проходимся по массиву полученных данных и создаем переменную, в которую засунем айди услуг по определенному айди специальности
            
                
                $n2 = mysqli_query($connect,"SELECT * FROM `services` WHERE `id_services` = $nnn ");
                $n2 = mysqli_fetch_all($n2);
                 //создаем новый запрос на получение данных по айди услуг , где айди равно нашей переменной
                
                ?> <?php
                foreach($n2 as $n){
//Делае  новый вложенный foreach для  прохода по услугам и получаем там уже сами услуги

                
                 ?><?=$n[1]//здесь мы их выводим ?> <hr>
                 <?php } ?> <?php } ?></td> 
               
               
    


                <td><a style="color:blue;" href="update_specialist.php?id=<?= $specialis[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
    </svg></a></td>
                <td><a style="color:red;" href="delete_specialist.php?id=<?= $specialis[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>

            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить нового специалиста</h1>
        <form action="create_specialist.php" method="post">
            <p>Фамилия:</p>
            <input type="text" name="fam">
            <p>Имя:</p>
            <input type="text" name="name">
            <p>Отчество:</p>
            <input type="text" name="otchestv19">
            <p>Специальность</p>
            <div class="select">
        <select  name="id_specialnosti"  id="format">
            <option selected disabled>Выберите специальность</option>
            <?php foreach($spec as $spec21){

            
              ?>
            <option value="<?=$spec21[0] ?>"><?= $spec21[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
            <p>Номер телефона</p>
            <input type="text" name="nomphone">
            <p>Дата рождения</p>
            <input type="date" name="date">
           
            



            <button type="submit">Добавить</button>

        </form>

        </div>
        <button @click="pokaz3=!pokaz3">Пациенты</button>
        <div v-show="pokaz3">
        <table>
            <tr>
                <th>id</th>
                <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Дата рождения</th>
            <th>Изменить</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($klient as $kln){

            
            ?>
            <tr>
                <td><?= $kln[0] ?></td>
                <td><?= $kln[1] ?></td>
                <td><?= $kln[2] ?></td>
                <td><?= $kln[3] ?></td>
                <td><?= $kln[4] ?></td>
                <td><?= $kln[5] ?></td>
                <td><?= $kln[6] ?></td>   


                <td><a style="color:blue;" href="update_klient.php?id=<?= $kln[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
    </svg></a></td>
                <td><a style="color:red;" href="delete_klient.php?id=<?= $kln[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>

            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить нового пациента</h1>
        <form action="create_klient.php" method="post">
            <p>Фамилия:</p>
            <input type="text" name="fam1">
            <p>Имя:</p>
            <input type="text" name="name1">
            <p>Отчество:</p>
            <input type="text" name="otchestvo1">
            <p>Адрес</p>
            <input type="text" name="address">
            <p>Номер телефона</p>
            <input type="text" name="nomphone1">
            <p>Дата рождения</p>
            <input type="date" name="date1">



            <button type="submit">Добавить</button>

        </form>

        </div>
        <button @click="pokaz4=!pokaz4">Договоры</button>
        <div v-show="pokaz4">
        <table>
            <tr>
                <th>id</th>
                <th>Специалист</th>
            <th>Айди пациента</th>
            <th>Дата</th>
            <th>Специальность</th>
            <th>Услуга</th>
            <th>Цена услуги</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($contract as $cnt){

            
            ?>
            <tr>
                <td><?= $cnt[0] ?></td>
                <td><?php 
                  $fff1 = mysqli_query($connect,"SELECT * FROM `specialist` WHERE `id_specialist` = $cnt[1]");
                  $fff1 = mysqli_fetch_assoc($fff1);
                ?>
                <?= $fff1['surname'] ?> <?= $fff1['name'] ?> <?= $fff1['patronymic'] ?></td>
                <td>
                <?php 
                  $fff2 = mysqli_query($connect,"SELECT * FROM `pacient` WHERE `id` = $cnt[2]");
                  $fff2 = mysqli_fetch_assoc($fff2);
                ?>
                <?= $fff2['surname'] ?> <?= $fff2['name'] ?> <?= $fff2['patronymic'] ?>    
               </td>
                <td><?= $cnt[3] ?></td>
                <td><?php 
                $sv1 = mysqli_query($connect,"SELECT * FROM `specialist` WHERE `id_specialist` = $cnt[1]");
                $sv1 = mysqli_fetch_assoc($sv1);
                $sv = $sv1['id_specialization'];
                //получаем данные по айди специалиста и присваиваем этот айди переменной для последующей работы с ней
                $svv = mysqli_query($connect,"SELECT * FROM `specialization` WHERE `id_specialization` = $sv");
                $svv = mysqli_fetch_assoc($svv);
                //из таблицы специальностей по переменной с айди специальности вытаскиваем название этой специальности
                ?><?= $svv['name_specialization']?>
                </td>
                <td><?php 
                $usluga = mysqli_query($connect,"SELECT * FROM `services` WHERE `id_services` = $cnt[4]");
                $usluga = mysqli_fetch_assoc($usluga);
                //тоже самое с названием услуги
                 ?><?= $usluga['name_services']?></td>
                 <td><?php 
                 $usluga1 = mysqli_query($connect,"SELECT * FROM `services` WHERE `id_services` = $cnt[4]");
                 $usluga1 = mysqli_fetch_assoc($usluga1);
                 // и с ценой услуги
                 ?><?= $usluga1['price']?> 
              


                <td><a style="color:red;" href="delete_contract.php?id=<?= $cnt[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>
        </td>
           
            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить новый договор</h1>
        <form action="create_contract1.php" method="post">
            <!-- создаем дополнительный файл , куда передаем по форме все данные , чтобы на следующем файле по выбранному специалисту выходили определенные услуги , принадлежащие этому специалисту -->
            <p>Специалист:</p>
            <div class="select">
        <select  name="specialist10"  id="format">
            <option selected disabled>Выберите специалиста</option>
            <?php foreach($specialist as $spc111){

            
              ?>
            <option value="<?=$spc111[0] ?>"><?= $spc111[1]?> <?= $spc111[2]?> <?= $spc111[3]?>  </option>
            <?php
            }
            ?>
        </select>
        </div>
            <p>Пациент:</p>
            <div class="select">
        <select  name="idpacienta"  id="format">
            <option selected disabled>Выберите пациента</option>
            <?php foreach($klient as $kln111){

            
              ?>
            <option value="<?=$kln111[0] ?>"><?= $kln111[1]?> <?= $kln111[2]?> <?= $kln111[3]?>  </option>
            <?php
            }
            ?>
        </select>
        </div>
            
            <p>Дата:</p>
            <input type="date" name="date10">
            <!-- <p>Услуга</p>
            
            <input type="text" name="idusluga"> -->



            <button type="submit">Добавить</button>

        </form>

        </div>
        
        <button style="margin-top:15px;" @click="pokaz6=!pokaz6">Рабочее время</button>
        <div v-show="pokaz6">
        <table>
        <tr>
                <th>id</th>
                <th>Часы работы</th>
                <th>Айди дня недели</th>
                <th>Айди специалиста</th>
                <th>Изменить</th>
            <th>Удалить</th>

            </tr>
            <?php 
            foreach($daywork as $work){

            
            ?>
            <tr>
                <td><?= $work[0] ?></td>
                <td><?= $work[1]?></td>
                <td><?php
                 $fil1 = mysqli_query($connect,"SELECT *
FROM `schedule`
WHERE `id_schedule` = $work[2]");
$fil1 = mysqli_fetch_assoc($fil1);  
 ?> <?= $fil1['day']?></td>
                <td><?php
                 $fil10 = mysqli_query($connect,"SELECT *
FROM `specialist`
WHERE `id_specialist` = $work[3]");
$fil10 = mysqli_fetch_assoc($fil10);  
 ?> <?= $fil10['surname']?> <?= $fil10['name']?> <?= $fil10['patronymic']?></td>   
                <td><a style="color:blue;" href="update_work.php?id=<?= $work[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
    </svg></a></td>
                <td><a style="color:red;" href="delete_work.php?id=<?= $work[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
    </svg></a></td>

            </tr>
            <?php 
            }
            ?>
        </table>
        <h1>Добавить</h1>
        <form action="create_work.php" method="post">
            <p>Часы:</p>
            <input type="text" name="hours1">
            <p>День недели:</p>
            <div class="select">
        <select  name="day1"  id="format">
            <option selected disabled>Выберите день недели</option>
            <?php foreach($day as $d1){

            
              ?>
            <option value="<?=$d1[0] ?>"><?= $d1[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
            <p>Специалист:</p>
            <div class="select">
        <select  name="idspecialista1"  id="format">
            <option selected disabled>Выберите специалиста</option>
            <?php foreach($specialist as $spc9){

            
              ?>
            <option value="<?=$spc9[0] ?>"><?= $spc9[1]?> <?= $spc9[2]?> <?= $spc9[3]?></option>
            <?php
            }
            ?>
        </select>
        </div>


            <button type="submit">Добавить</button>

        </form>

        </div>
        </div>
        <?php
         ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.30/vue.global.min.js"></script>
        <script>
            const add = {
    data() {
        return {
            pokaz:false,
            pokaz1:false,
            pokaz2:false,
            pokaz3:false,
            pokaz4:false,
            pokaz5:false,
            pokaz6:false,
            pokaz7:false,
            
        
        }
    }
    }
    Vue.createApp(add).mount('#container');
    </script>
        
    </body>
    </html>