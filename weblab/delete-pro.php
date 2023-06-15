<?php  
session_start();
include("../check-login.php");
include("../connection.php.php");

if(isset($_GET['pid'])){
	$del_id = $_GET['pid'];

	$delete = "DELETE FROM tbl_products WHERE pid ='$del_id'";

	$result = mysqli_query($con,$delete);
	if($result){
		header("Location: product.php");
		
	}
	else{
		echo "delete fail";
	}
}

?>