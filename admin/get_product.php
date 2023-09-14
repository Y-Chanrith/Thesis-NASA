<?php 
include '../connection.php';

 if($_GET['id']){
    $cat_id=$_GET['id'];
    $productsql = "SELECT * FROM product WHERE category_id=" . $cat_id;
    $result = mysqli_query($con, $productsql);
    $products=[];
      if (mysqli_num_rows($result) > 0){
         while ($product = mysqli_fetch_assoc($result)){
            array_push($products,$product);
         }

      }

   //  $product = mysqli_fetch_assoc($result);
   // var_dump($product);
    echo json_encode($products);
   // echo $product; 
 }
?>