<?php 
require_once 'podkl.php';
$klient= mysqli_query($podkl,"SELECT * FROM `klient`");
$klient = mysqli_fetch_all($klient);
$zakaz= mysqli_query($podkl,"SELECT * FROM `zakaz`");
$zakaz = mysqli_fetch_all($zakaz);
$tur= mysqli_query($podkl,"SELECT * FROM `tur`");
$tur = mysqli_fetch_all($tur);
$gorod= mysqli_query($podkl,"SELECT * FROM `gorod`");
$gorod = mysqli_fetch_all($gorod);
$strana= mysqli_query($podkl,"SELECT * FROM `strana`");
$strana = mysqli_fetch_all($strana);
$uslugi= mysqli_query($podkl,"SELECT * FROM `uslugi`");
$uslugi = mysqli_fetch_all($uslugi);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
<div id="container">
  <h1 style="display:flex;align-items:center;justify-content:center;"> Турагенство</h1>
  <button @click="pokaz=!pokaz">Клиенты</button>
  <div v-show="pokaz">
  <table>
        <tr>
            <th>id</th>
            <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Паспорт</th>
        <th>Телефон</th>
        <th>Обновить</th>
        <th>Удалить</th>


        </tr>
        <?php 
        foreach($klient as $kl){

        
        ?>
        <tr>
            <td><?= $kl[0] ?></td>
            <td><?= $kl[1] ?></td>
            <td><?= $kl[2] ?></td>
            <td><?= $kl[3] ?></td>
            <td><?= $kl[4] ?></td>
            <td><?= $kl[5] ?></td>

            <td><a style="color:blue;" href="update_klienta.php?id=<?= $kl[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_klient.php?id=<?= $kl[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>

        </tr>
        <?php 
        }
        ?>
    </table>
    <h1>Добавить нового клиента</h1>
    <form action="create_klient.php" method="post">
        <p>Фамилия:</p>
        <input type="text" name="fam">
        <p>Имя:</p>
        <input type="text" name="nam">
        <p>Отчество:</p>
        <input type="text" name="otch">
        <p>Данные паспорта:</p>
        <input type="text" name="pasp">
         <p>Номер телефона:</p>
        <input type="text" name="phone">


        <button type="submit">Добавить</button>

    </form>
    </div>
    <button @click="pokaz1=!pokaz1">Заказ</button>
    <div v-show="pokaz1">
    <table>
        <tr>
            <th>id</th>
            <th>Клиент(айди)</th>
        <th>Тур(айди)</th>
        <th>Дата</th>
        <th>Обновить</th>
        <th>Удалить</th>
        </tr>
        <?php 
        foreach($zakaz as $zak){

        
        ?>
        <tr>
            <td><?= $zak[0] ?></td>
            <td><?= $zak[1] ?></td>
            <td><?= $zak[2] ?></td>
            <td><?= $zak[3] ?></td>

            <td><a style="color:blue;" href="update_zakaz.php?id=<?= $zak[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_zakaz.php?id=<?= $zak[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>

        </tr>
        <?php 
        }
        ?>
    </table>
    <h1>Добавить новый заказ</h1>
    <form action="create_zakaz.php" method="post">
        <p>Айди клиента:</p>
        <?php
        foreach($klient as $kli){
            ?>
            <p>Фамилия : <?= $kli[1]?> - Имя:  <?= $kli[2]?> - Отчество :  <?= $kli[3]?> - Айди: <?= $kli[0]?> </p>
            <?php
        }
        ?>
        <input type="text" name="idklienta10">
        <p>Айди тура:</p>
        <hr>
        <?php
        foreach($tur as $t){
            ?>
            <p>Длительность : <?= $t[4]?> - Дата:  <?= $t[2]?> - Цена :  <?= $t[3]?> - Айди: <?= $t[0]?> </p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="idtura10">
        <p>Дата</p>
        <input type="date" name="date10">
        <button type="submit">Добавить</button>

    </form>

    </div>

<button @click="pokaz2=!pokaz2">Туры</button>

    <div v-show="pokaz2">
    <table>
        <tr>
            <th>id</th>
            <th>Айди услуги</th>
        <th>Дата</th>
        <th>Цена</th>
        <th>Длительность</th>
        <th>Количество людей</th>
        <th>Изменить</th>
        <th>Удалить</th>

        </tr>
        <?php 
        foreach($tur as $tur1){

        
        ?>
        <tr>
            <td><?= $tur1[0] ?></td>
            <td><?= $tur1[1] ?></td>
            <td><?= $tur1[2] ?></td>
            <td><?= $tur1[3] ?></td>
            <td><?= $tur1[4] ?></td>
            <td><?= $tur1[5] ?></td> 
   


            <td><a style="color:blue;" href="update_tur.php?id=<?= $tur1[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_tur.php?id=<?= $tur1[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>

        </tr>
        <?php 
        }
        ?>
    </table>
    <h1>Добавить новый тур</h1>
    <form action="create_tur.php" method="post">
        <p>Код услуги:</p>
        <hr>
        <?php
        foreach($uslugi as $usl){
            ?>
            <p>Код страны : <?= $usl[1]?> - Проживание:  <?= $usl[2]?> - Питание :  <?= $usl[3]?> - Экскурсия: <?= $usl[4]?> - Айди: <?= $usl[0]?> </p>
            <?php
        }
        ?>
        <hr>
        <input type="text" name="usl1">
        <p>Дата:</p>
        <input type="date" name="date1">
        <p>Цена:</p>
        <input type="text" name="price1">
        <p>Длительность</p>
        <input type="text" name="duration1">
        <p>Количество людей</p>
        <input type="text" name="kolvo1">
        



        <button type="submit">Добавить</button>

    </form>

    </div>
    <button @click="pokaz3=!pokaz3">Город</button>
    <div v-show="pokaz3">
    <table>
        <tr>
            <th>id</th>
            <th>Город</th>
        <th>Изменить</th>
        <th>Удалить</th>

        </tr>
        <?php 
        foreach($gorod as $g){

        
        ?>
        <tr>
            <td><?= $g[0] ?></td>
            <td><?= $g[1] ?></td>
              


            <td><a style="color:blue;" href="update_gorod.php?id=<?= $g[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_gorod.php?id=<?= $g[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>

        </tr>
        <?php 
        }
        ?>
    </table>
    <h1>Добавить новый город</h1>
    <form action="create_gorod.php" method="post">
        <p>Город:</p>
        <input type="text" name="gorod2">
      



        <button type="submit">Добавить</button>

    </form>

    </div>
    <button @click="pokaz4=!pokaz4">Страна</button>
    <div v-show="pokaz4">
    <table>
        <tr>
            <th>id</th>
            <th>Айди города</th>
        <th>Страна</th>
        <th>Изменить</th>
        <th>Удалить</th>

        </tr>
        <?php 
        foreach($strana as $str){

        
        ?>
        <tr>
            <td><?= $str[0] ?></td>
            <td><?= $str[1] ?></td>
            <td><?= $str[2] ?></td>
            
               


            <td><a style="color:blue;" href="update_strana.php?id=<?= $str[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_strana.php?id=<?= $str[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>

        </tr>
        <?php 
        }
        ?>
    </table>
    <h1>Добавить новую страну</h1>
    <form action="create_strana.php" method="post">
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
        <input type="text" name="idgorod3">
        <p>Страна:</p>
        
        <input type="text" name="strana3">
        

        <button type="submit">Добавить</button>

    </form>

    </div>
     <button @click="pokaz5=!pokaz5">Услуги</button>
     <div v-show="pokaz5">
     <table>
     <tr>
            <th>id</th>
            <th>Айди страны</th>
            <th>Проживание</th>
            <th>Питание</th>
            <th>Экскурсия</th>
            <th>Обновить</th>
            <th>Удалить</th>



        </tr>
        <?php 
        foreach($uslugi as $uslugi3){

        
        ?>
        <tr>
            <td><?= $uslugi3[0] ?></td>
            <td><?= $uslugi3[1] ?></td>
            <td><?= $uslugi3[2] ?></td>
            <td><?= $uslugi3[3] ?></td>
            <td><?= $uslugi3[4] ?></td>
            
            <td><a style="color:blue;" href="update_usluga.php?id=<?= $uslugi3[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></a></td>
            <td><a style="color:red;" href="delete_usluga.php?id=<?= $uslugi3[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a></td>


        </tr>
        <?php 
        }
        ?>
     </table>
     <h1>Добавить услугу</h1>
    <form action="create_usluga.php" method="post">
        <p>Айди страны:</p>
        <hr>

    <?php 
    foreach($strana as $str5){

    ?>
    <p> Айди города: <?= $str5[1]?>- Страна: <?= $str5[2]?>- Айди страны: <?= $str5[0]?>  </p>
    <?php 
    }
    ?>
        <hr>
        <input type="text" name="idstrana5">
        <p>Проживание:</p>
        <input type="text" name="proziv">
        <p>Питание:</p>
        
        <input type="text" name="pitanie">
        <p>Экскурсия:</p>
        
        <input type="text" name="ekskursia">


        <button type="submit">Добавить</button>

    </form>
     </div>
    
     </div>
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