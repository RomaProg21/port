<?php 
require_once 'config/connect.php';
$orderid = $_GET['id'];
$product = mysqli_query($mysqli,"SELECT * FROM `product` WHERE `product_code`='$productid'");
$product = mysqli_fetch_assoc($product);
$supplier = mysqli_query($mysqli,"SELECT * FROM `supplier`");
$supplier = mysqli_fetch_all($supplier);
$client = mysqli_query($mysqli,"SELECT * FROM `client`");
$client = mysqli_fetch_all($client);
$seller = mysqli_query($mysqli,"SELECT * FROM `seller`");
$seller = mysqli_fetch_all($seller);
$product1 = mysqli_query($mysqli, "SELECT * FROM `product`");
$product1 = mysqli_fetch_all($product1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
<form action="up_orders1.php" method="post"> 
<input type="hidden" name ="id" value="<?= $orderid ?>">

        <p>Client_code</p>
        <hr>
        <?php 
        foreach($client as $client9){
        ?>
        <p>Организация: <?=$client9[1]?> - Директор: <?=$client9[2]?> - Айди: <?=$client9[0]?></p>
        <?php 
        }
        ?>
        <hr>
        <input type="text" name="clientcod">
        <p>Seller_code</p>
        <hr>
        <?php 
        foreach($seller as $sell9){
        ?>
        <p>Фамилия: <?=$sell9[1]?> - Имя: <?=$sell9[2]?> - Отчество: <?=$sell9[3]?> - Паспорт: <?=$sell9[6]?> - Айди: <?=$sell9[0]?></p>
        <?php 
        }
        ?>
        <hr>
        <input type="text" name="sellercod">
        <p>Product</p>
        <hr>
        <?php 
        foreach($product1 as $product9){
        ?>
        <p>Название товара: <?=$product9[2]?> - Айди: <?=$product9[0]?></p>
        <?php 
        }
        ?>
        <hr>
        <input type="text" name="productcod">
        <p>Quanity</p>
        <input type="text" name="quanity">
        <p>Result</p>
        <input type="text" name="result">
        <button type="submit">Добавить</button>
    </form>
    
</body>
</html>