<?php  
session_start();
include("../check-login.php");
include("../connection.php");

if(isset($_GET['id'])){
	$del_id = $_GET['id'];

	$delete = "DELETE from users WHERE id ='$del_id'";

	$result = mysqli_query($con,$delete);
	if($result){
		header("Location: user.php");
	}
	else{
		echo "delete fail";
	}
}

?>