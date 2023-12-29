<?php
include '../connection.php';

if($_GET['id']){
    $qty=$_GET['qty'];
    $sql="select * from  product where id=".$_GET['id'];
    $result = mysqli_query($con, $sql);
    $product=$result->fetch_assoc();
    $stock=$product['stock'];
    if($stock-$qty<0){
        $result=[
            'status'=>'fail',
            'message'=>'Out of stock'
        ];

        echo json_encode($result);
    }else{
        $result=[
            'status'=>'success',
            'id'=>$_GET['id'],
            'stock'=>$stock
        ];
        echo json_encode($result);
    }
}
?>
