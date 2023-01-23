<?php
require_once 'config/connect.php';
$seller = mysqli_query($mysqli,"SELECT * FROM `seller`");
$seller = mysqli_fetch_all($seller);
$client = mysqli_query($mysqli,"SELECT * FROM `client`");
$client = mysqli_fetch_all($client);
$supplier = mysqli_query($mysqli,"SELECT * FROM `supplier`");
$supplier = mysqli_fetch_all($supplier);
$product = mysqli_query($mysqli, "SELECT * FROM `product`");
$product = mysqli_fetch_all($product);
$orders = mysqli_query($mysqli,"SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders);
$filtr = mysqli_query($mysqli,"SELECT * FROM `orders` WHERE DATE(`order_date`)
 BETWEEN '2022-11-23' AND '2022-11-30'");
$fil = mysqli_query($mysqli,"SELECT *
FROM `orders`
WHERE `order_date` BETWEEN '2022-11-29 11:30:37' AND '2022-11-30 23:59:59'");
$fil = mysqli_fetch_all($fil);
$fil1 = mysqli_query($mysqli,"SELECT *
FROM `orders`
WHERE `order_date` BETWEEN '2022-11-29 00:01:03' AND '2022-12-5 23:59:59'");
$fil1 = mysqli_fetch_all($fil1);
$fil2 = mysqli_query($mysqli,"SELECT *
FROM `orders`
WHERE `order_date` BETWEEN '2022-10-29 00:01:03' AND '2022-11-29 23:59:59'");
$fil2 = mysqli_fetch_all($fil2);
$prd111 = mysqli_query($mysqli, "SELECT * FROM `product` WHERE `total_cost` > 100000");
$prd111 = mysqli_fetch_all($prd111);
$prd1111 = mysqli_query($mysqli, "SELECT * FROM `product` WHERE `total_cost` > 500000");
$prd1111 = mysqli_fetch_all($prd1111);
$prd11111 = mysqli_query($mysqli, "SELECT * FROM `product` WHERE `total_cost` > 1000000");
$prd11111 = mysqli_fetch_all($prd11111);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        button{
            margin: 15px 0px 15px 0px;
            
        }
    table{
	width: 100%;
	margin-bottom: 20px;
	border: 15px solid #F2F8F8;
	border-top: 5px solid #F2F8F8;
	border-collapse: collapse; 
}
table th {
	font-weight: bold;
	padding: 5px;
    background: teal;

	border: none;
	border-bottom: 5px solid #F2F8F8;
}
table td {
	padding: 5px;
	border: none;
	border-bottom: 5px solid #F2F8F8;
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
   color:black;
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
   width: 21em;
   height: 3em;
   line-height: 3;
   background: blue;
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
   background: blue;
   cursor:pointer;
   pointer-events:none;
   transition:.25s all ease;
}
.select:hover::after {
   color: #23b499;
}
        
        
    </style>

</head>
<body>
    <div id="app" style="display:flex">
        <button @click="v=!v" class="btn btn-primary">Seller</button>
        <div v-show="v">
        <table >
            <tr>
                <th>Seller_code</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Patronumic</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Passord_data</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Обновить</th>
        <th>Удалить</th>
            </tr>
            <?php 
            foreach($seller as $sell){

            ?>
            <tr>
                <td><?= $sell[0]?></td>
                <td><?= $sell[1]?></td>
                <td><?= $sell[2]?></td>
                <td><?= $sell[3]?></td>
                <td><?= $sell[4]?></td>
                <td><?= $sell[5]?></td>
                <td><?= $sell[6]?></td>
                <td><?= $sell[7]?></td>
                <td><?= $sell[8]?></td>
                <td style="font-size: 21px;"><a style="color:blue;text-decoration:none;" href="up.php?id=<?= $sell[0] ?>">&#8593;</a></td>
            <td style="font-size: 21px;"><a style="color:red;" href="del_seller.php?id=<?= $sell[0] ?>">&#9003;</a></td>

            </tr>
            <?php 
            }
            ?>
        </table>
        <hr>
        <h3>Добавить нового продавца</h3>
        <form action="create_seler.php" method="post"> 
        <p>Surnname:</p>
        <input type="text" name="surname">
        <p>Name</p>
        <input type="text" name="name">
        <p>Patronymic</p>
        <input type="text" name="patronymic">
        <p>Gender</p>
        <input type="text" name="gender">
        <p>Passport_data</p>
        <input type="text" name="passport">
        <p>Address</p>
        <input type="text" name="address">
        <p>Phone</p>
        <input type="text" name="phone">
        <button type="submit"  class="btn btn-success">Добавить</button>
    </form>
        <hr>
        </div>
        <button @click="v1=!v1" class="btn btn-primary">Client</button>
        <div v-show="v1">
        <table>
            <tr>
                <th>Client_code</th>
                <th>Organization_name</th>
                <th>director</th>
                <th>phone</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($client as $clien){

            ?>
            <tr>
                <td><?= $clien[0]?></td>
                <td><?= $clien[1]?></td>
                <td><?= $clien[2]?></td>
                <td><?= $clien[3]?></td>
                <td style="font-size: 21px;"><a style="color:blue;" href="up_client.php?id=<?= $clien[0] ?>">&#8593;</a></td>
            <td style="font-size: 21px;"><a style="color:red;" href="del_client.php?id=<?= $clien[0] ?>">&#9003;</a></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <hr>
        <h3>Добавить нового клиента</h3>
        <form action="create_client.php" method="post"> 
        <p>Organization_name:</p>
        <input type="text" name="organization">
        <p>Director</p>
        <input type="text" name="director">
        <p>Phone</p>
        <input type="text" name="phone">
        <button type="submit"  class="btn btn-success">Добавить</button>
    </form>
        <hr>
        </div>
        <button class="btn btn-primary" @click="v2=!v2">Supplier</button>
        <div v-show="v2">
        <table>
            <tr>
                <th>Supplier_code</th>
                <th>Firm_name</th>
                <th>Country</th>
                <th>Delivery_date</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($supplier as $sup){

            ?>

            <tr>
                <td><?=$sup[0] ?></td>
                <td><?=$sup[1] ?></td>
                <td><?=$sup[2] ?></td>
                <td><?=$sup[3] ?></td>
                <td style="font-size: 21px;"><a style="color:blue;" href="up_supplier.php?id=<?= $sup[0] ?>">&#8593;</a></td>
            <td style="font-size: 21px;"><a style="color:red;" href="del_supplier.php?id=<?= $sup[0] ?>">&#9003;</a></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <hr>
        <h3>Добавить нового поставщика</h3>
        <form action="create_supplier.php" method="post"> 
        <p>Firm_name:</p>
        <input type="text" name="firma">
        <p>Country</p>
        <input type="text" name="country1">
        <button type="submit"  class="btn btn-success">Добавить</button>
    </form>
        <hr>
        </div>
        <button @click="v3=!v3" class="btn btn-primary">Product</button>
        <div v-show="v3">
        <table>
            <tr>
                <th>Product_code</th>
                <th>Product_name</th>
                <th>Description</th>
                <th>Unit_price</th>
                <th>Guarantee</th>
                <th>Remains</th>
                <th>Total_cost</th>
                <th>Country</th>
                <th>Supplier_code</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($product as $prd){

            ?>
            <tr>
                <td><?= $prd[0] ?></td>
                <td><?= $prd[1] ?></td>
                <td><?= $prd[2] ?></td>
                <td><?= $prd[3] ?></td>
                <td><?= $prd[4] ?></td>
                <td><?= $prd[5] ?></td>
                <td><?= $prd[6] ?></td>
                <td><?= $prd[7] ?></td>
                <td><?= $prd[8] ?></td>
                <td style="font-size: 21px;"><a style="color:blue;" href="up_product.php?id=<?= $prd[0] ?>">&#8593;</a></td>
            <td style="font-size: 21px;"><a style="color:red;" href="del_product.php?id=<?= $prd[0] ?>">&#9003;</a></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <button style="margin:15px" class="btn btn-dark" @click="v8=!v8" >Больше 100 тысяч</button>
        <div v-show="v8">
        <table>
            <tr>
                <th>Product_code</th>
                <th>Product_name</th>
                <th>Description</th>
                <th>Unit_price</th>
                <th>Guarantee</th>
                <th>Remains</th>
                <th>Total_cost</th>
                <th>Country</th>
                <th>Supplier_code</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($prd111 as $prd1){

            ?>
            <tr>
                <td><?= $prd1[0] ?></td>
                <td><?= $prd1[1] ?></td>
                <td><?= $prd1[2] ?></td>
                <td><?= $prd1[3] ?></td>
                <td><?= $prd1[4] ?></td>
                <td><?= $prd1[5] ?></td>
                <td><?= $prd1[6] ?></td>
                <td><?= $prd1[7] ?></td>
                <td><?= $prd1[8] ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>

        </div>
        
        <button style="margin:15px" class="btn btn-dark" @click="v9=!v9">Больше 500 тысяч</button>
        <div v-show="v9">
        <table>
            <tr>
                <th>Product_code</th>
                <th>Product_name</th>
                <th>Description</th>
                <th>Unit_price</th>
                <th>Guarantee</th>
                <th>Remains</th>
                <th>Total_cost</th>
                <th>Country</th>
                <th>Supplier_code</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($prd1111 as $prd1){

            ?>
            <tr>
                <td><?= $prd1[0] ?></td>
                <td><?= $prd1[1] ?></td>
                <td><?= $prd1[2] ?></td>
                <td><?= $prd1[3] ?></td>
                <td><?= $prd1[4] ?></td>
                <td><?= $prd1[5] ?></td>
                <td><?= $prd1[6] ?></td>
                <td><?= $prd1[7] ?></td>
                <td><?= $prd1[8] ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>

        </div>
        <button style="margin:15px" class="btn btn-dark" @click="v10=!v10">Больше миллиона</button>
        <div v-show="v10">
        <table>
            <tr>
                <th>Product_code</th>
                <th>Product_name</th>
                <th>Description</th>
                <th>Unit_price</th>
                <th>Guarantee</th>
                <th>Remains</th>
                <th>Total_cost</th>
                <th>Country</th>
                <th>Supplier_code</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($prd11111 as $prd2){

            ?>
            <tr>
                <td><?= $prd2[0] ?></td>
                <td><?= $prd2[1] ?></td>
                <td><?= $prd2[2] ?></td>
                <td><?= $prd2[3] ?></td>
                <td><?= $prd2[4] ?></td>
                <td><?= $prd2[5] ?></td>
                <td><?= $prd2[6] ?></td>
                <td><?= $prd2[7] ?></td>
                <td><?= $prd2[8] ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>

        </div>
        <hr>
        <h3>Добавить новый продукт</h3>
        <form action="create_product.php" method="post"> 
        <p>Product_name:</p>
        <input type="text" name="prdname">
        <p>Description</p>
        <input type="text" name="despt">
        <p>Unit_price</p>
        <input type="text" name="unitprice1">
        <p>Guarantee</p>
        <input type="text" name="guarant">
        <p>Remains</p>
        <input type="text" name="remains1">
        <p>Total_cost</p>
        <input type="text" name="totcos">
        <p>Country</p>
        <input type="text" name="country1">
        <p>Supplier_code</p>
        <input type="text" name="supcode">
        <button type="submit"  class="btn btn-success">Добавить</button>
    </form>
        <hr>
        </div>
        <button @click="v4=!v4" class="btn btn-primary">Orders</button>
        <div v-show="v4">
        <table>
            <tr>
                <th>Orders_code</th>
                <th>Client_code</th>
                <th>Seller_code</th>
                <th>Product_code</th>
                <th>Quanity</th>
                <th>Result</th>
                <th>Order_date</th>
                <th>&#9998;</th>
        <th>&#10006;</th>
            </tr>
            <?php 
            foreach($orders as $order){

            ?>

            <tr>
                <td><?=$order[0] ?></td>
                <td><?php $f = mysqli_query($mysqli,"SELECT * FROM `client` WHERE `client_code` = $order[1]");
                        $f = mysqli_fetch_assoc($f)
                ?>
                <?= $f['director'] ?> (<?=$order[1] ?>)</td>
                <td> <?php $f1 = mysqli_query($mysqli,"SELECT * FROM `seller` WHERE `seller_code` = $order[2]");
                        $f1 = mysqli_fetch_assoc($f1)
                ?>
                <?= $f1['surname'] ?> <?= $f1['name'] ?>  <?= $f1['patronymic'] ?> (<?=$order[2] ?>)</td>
                <td><?php $f2 = mysqli_query($mysqli,"SELECT * FROM `product` WHERE `product_code` = $order[3]");
                        $f2 = mysqli_fetch_assoc($f2)
                ?>
                <?= $f2['product_name'] ?> (<?=$order[3] ?>)</td>
                <td><?=$order[4] ?></td>
                <td><?=$order[5] ?></td>
                <td><?=$order[6] ?></td>

                <td style="font-size: 21px;"><a style="color:blue;" href="up_orders.php?id=<?= $order[0] ?>">&#8593;</a></td>
            <td style="font-size: 21px;"><a style="color:red;" href="del_orders.php?id=<?= $order[0] ?>">&#9003;</a></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <button @click="v5=!v5" style="margin:0px 15px 0px" class="btn btn-dark">За день</button>
        <div v-show="v5">
            <table>
            <th>Orders_code</th>
                <th>Client_code</th>
                <th>Seller_code</th>
                <th>Product_code</th>
                <th>Quanity</th>
                <th>Result</th>
                <th>Order_date</th>
                <th>&#9998;</th>
        <th>&#10006;</th>

        <?php 
        foreach($fil as $f){
        ?>
        <tr>
                <td><?=$f[0] ?></td>
                <td><?=$f[1] ?></td>
                <td><?=$f[2] ?></td>
                <td><?=$f[3] ?></td>
                <td><?=$f[4] ?></td>
                <td><?=$f[5] ?></td>
                <td><?=$f[6] ?></td>

        <?php
        }
        ?>
                    </table>

        </div>
        <button @click="v7=!v7" style="margin:0px 15px 0px" class="btn btn-dark">За неделю</button>
        <div v-show="v7">
            <table>
            <th>Orders_code</th>
                <th>Client_code</th>
                <th>Seller_code</th>
                <th>Product_code</th>
                <th>Quanity</th>
                <th>Result</th>
                <th>Order_date</th>
                <th>&#9998;</th>
        <th>&#10006;</th>

        <?php 
        foreach($fil2 as $f2){
        ?>
        <tr>
                <td><?=$f2[0] ?></td>
                <td><?=$f2[1] ?></td>
                <td><?=$f2[2] ?></td>
                <td><?=$f2[3] ?></td>
                <td><?=$f2[4] ?></td>
                <td><?=$f2[5] ?></td>
                <td><?=$f2[6] ?></td>

        <?php
        }
        ?>
                    </table>
                    </div>
                    <button @click="v6=!v6" style="margin:0px 15px 0px" class="btn btn-dark">За месяц</button>
        <div v-show="v6">
            <table>
            <th>Orders_code</th>
                <th>Client_code</th>
                <th>Seller_code</th>
                <th>Product_code</th>
                <th>Quanity</th>
                <th>Result</th>
                <th>Order_date</th>
                <th>&#9998;</th>
        <th>&#10006;</th>

        <?php 
        foreach($fil1 as $f1){
        ?>
        <tr>
                <td><?=$f1[0] ?></td>
                <td><?=$f1[1] ?></td>
                <td><?=$f1[2] ?></td>
                <td><?=$f1[3] ?></td>
                <td><?=$f1[4] ?></td>
                <td><?=$f1[5] ?></td>
                <td><?=$f1[6] ?></td>

        <?php
        }
        ?>
                    </table>
                    </div>
        <hr>
        <h3>Новый заказ</h3>
        <form action="create_orders.php" method="post"> 
        <p>Client_code</p>
        <div class="select">
        <select  name="clientcod"  id="format">
            <option selected disabled>Client</option>
            <?php foreach($client as $client9){

            
              ?>
            <option value="<?=$client9[0] ?>"><?= $client9[2]?> <?= $client9[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
       
        <p>Seller_code</p>
        <div class="select">
        <select  name="sellercod"  id="format">
            <option selected disabled>Seller</option>
            <?php foreach($seller as $sell9){

            
              ?>
            <option value="<?=$sell9[0] ?>"><?= $sell9[1]?> <?= $sell9[2]?> <?=$sell9[3]?> Паспорт:<?=$sell9[6]?></option>
            <?php
            }
            ?>
        </select>
        </div>
        
        
        <p>Product</p>
        <div class="select">
        <select name="productcod"  id="format">
            <option selected disabled>Product</option>
            <?php foreach($product as $product9){
                
            
              ?>
            <option value="<?=$product9[0] ?>"><?= $product9[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="select">
        <select v-model="selected"    id="format">
            <option selected disabled>Product</option>
            <?php foreach($product as $product9){
                
            
              ?>
            <option value="<?=$product9[3]?>"><?= $product9[1]?></option>
            <?php
            }
            ?>
        </select>
        </div>
       
        <p>Quanity</p>
        <input type="text" name="quanity" v-model="vmodel">
        <p>Result</p>
    
        
        <input type="text" name="result" :value="vmodel*selected" >
            
        <button type="submit"  class="btn btn-success">Добавить</button>
    </form>
        <hr>
        </div>
        


    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.30/vue.global.min.js"></script>
    <script>
        const C = {
  data() {
    return {
        v:false,
        v1:false,
        v2:false,
        v3:false,
        v4:false,
        v5:false,
        v6:false,
        v7:false,
        v8:false,
        v9:false,
        v10:false,
        vmodel:'',
        selected:'',
        selected1:'',
     
        
     
    }
  }
}
Vue.createApp(C).mount('#app');
</script>
    
</body>
</html>