<?php include '../connection.php'; ?>

<?php
if ($_POST) {
    // var_dump(var_export($_POST['id'][0]));/
    $id = $_POST['customer'];
    $subtotal = $_POST['subtotal'];
    $qty = $_POST['total_qty'];
    $grandtotal = $_POST['grand_total'];
    date_default_timezone_set("Asia/Bangkok");
    $created_at =  date("Y-m-d H:i:s", time());
    $updated_at= date("Y-m-d H:i:s", time());
    $payment_method=$_POST['payment_method'];
    // var_dump(date());
    $sql = "INSERT INTO transaction(cust_id, subtotal, quantity, grandtotal,payment_method,created_at,updated_at) VALUES($id, $subtotal, $qty, $grandtotal,'$payment_method','$created_at','$updated_at')";
    $con->query($sql);
    // var_dump($transac);
    $transac_id=$con->insert_id;
    $i = 0;
    for ($i; $i < count($_POST['id']); $i++) {
        $sql="select * from  product where id=".$_POST['id'][$i];
        $result = mysqli_query($con, $sql);
        $product=$result->fetch_assoc();
        // $stock=;
        $qty=(int)$product['stock']-(int)$_POST['qty'][$i];
    // var_dump(is_numeric());

        $sql_update="update product set stock=$qty where id=".$_POST['id'][$i];
        // var_dump(mysqli_query($con, $sql_update));
        $con->query($sql_update);
        $id=$_POST['id'][$i];
        $price=$_POST['price'][$i];
        $qty=$_POST['qty'][$i];
        date_default_timezone_set("Asia/Bangkok");
        $created_at =  date("Y-m-d H:i:s", time());
        $updated_at= date("Y-m-d H:i:s", time());

        $sql = "INSERT INTO transaction_detail(transac_id, product_id, qty, price,created_at,updated_at)
             VALUES($transac_id,$id, $qty,$price,'$created_at','$updated_at')";
            $result = mysqli_query($con, $sql);

        // if ($result) {
        //     header("Location: pos.php");
        // } else {
        //     echo "Error!";
        // }
    }
    header("Location: pos.php");
}


?>
