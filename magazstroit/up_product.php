<?php 
require_once 'config/connect.php';
$productid = $_GET['id'];
$product = mysqli_query($mysqli,"SELECT * FROM `product` WHERE `product_code`='$productid'");
$product = mysqli_fetch_assoc($product);
$supplier = mysqli_query($mysqli,"SELECT * FROM `supplier`");
$supplier = mysqli_fetch_all($supplier);
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
<form action="up_product1.php" method="post">
    <input type="hidden" name ="id" value="<?= $productid ?>">
        <p>Product_name</p>
        <input type="text" name="productname" value="<?=$product['product_name']?>">
        <p>Description :</p>
        <input type="text" name="descr" value="<?=$product['description']?>">
        <p>Unit_price</p>
        <input type="text" name="unit" value="<?= $product['unit_price'] ?>">
        <p>Guarantree</p>
        <input type="text" name="guar" value="<?= $product['guarantree'] ?>">
        <p>Remains</p>
        <input type="text" name="rem" value="<?= $product['remains'] ?>">
        <p>Total_cost</p>
        <input type="text" name="totcost" value="<?= $product['total_cost'] ?>">
        <p>Country</p>
        <input type="text" name="countr" value="<?= $product['country'] ?>">
        <p>Supplier_code</p>
        <?php 
        foreach($supplier as $supp){
        ?>
        <p>Название: <?= $supp[1] ?> (Айди:<?=$supp[0]?>)</p>

        <?php 
        }
        ?>
        <input type="text" name="suppliercode" value="<?= $product['supplier_code'] ?>">

        <button type="submit">Изменить</button>

    </form>
    
</body>
</html>