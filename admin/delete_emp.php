<?php  
session_start();
include("../check-login.php");
include("../connection.php");

if(isset($_GET['eid'])){
	$del_id = $_GET['eid'];

	$delete = "DELETE from employee WHERE eid ='$del_id'";

	$result = mysqli_query($con,$delete);
	if($result){
		header("Location: employee.php");
	}
	else{
		echo "delete fail";
	}
}

?>