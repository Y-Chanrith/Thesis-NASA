<?php
include '../connection.php';

    if($_POST){
        $product_id=$_POST['product_id'];
        $current_stock=$_POST['current_stock']??0;
        $qty=$_POST['qty'];
        $price=$_POST['price'];
        date_default_timezone_set("Asia/Bangkok");
        $created_at =  date("Y-m-d H:i:s", time());
        $updated_at= date("Y-m-d H:i:s", time());
        //  var_dump($result);
        $sql = "INSERT INTO product_stock(price,qty,product_id,created_at,updated_at) VALUES('$price', '$qty', '$product_id', '$created_at','$updated_at')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = "UPDATE product set stock= '$current_stock' where id='$product_id'";
            $result = mysqli_query($con, $sql);
            if($result){
                header("Location: stock.php");
            }
        } else {
        echo "Error!";
        }

    }



    // //get product
    // $sql="select id,stock from product";
    // // $product= mysqli_query($con, $sql);
    // $products = mysqli_query($con, $sql) or die(mysqli_error($con));
    // while ($product = mysqli_fetch_assoc($products)) {

    // }


    // if($_GET['from_date'] ){
    //     $sql="select * from product where created_at between". $_GET['from_date']." and ". $_GET['to_date'];
    //     $products = mysqli_query($con, $sql) or die(mysqli_error($con));

    // }else {
    //     $sql="select * from product";
    //     $products = mysqli_query($con, $sql) or die(mysqli_error($con));
    //     while ($product = mysqli_fetch_assoc($products)) {

    //     }
    // }
    // $product= mysqli_query($con, $sql);


?>
