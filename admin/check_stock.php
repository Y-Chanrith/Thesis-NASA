<?php
include '../connection.php';

if($_GET['id']){
    $qty=$_GET['qty'];
    $sql="select * from  product where id=".$_GET['id'];
    $result = mysqli_query($con, $sql);
    $product=$result->fetch_assoc();
    $stock=$product['stock'];
    if($stock-$qty==0){
        echo 'Out of stock';
    }else if($stock-$qty<0){
        echo 'Not enought product';

    }else{
        echo 'success';
    }

}
?>
