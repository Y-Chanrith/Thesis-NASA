<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./fontawesome/css/fontawesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>

<body>
	<?php
	session_start();
	include("../check-login.php");
	include("../connection.php");
	$idd = $_POST['idd'];
	$qty = $_POST['qty'];
	$date = $_POST['date'];

	$query = 'UPDATE product set STOCK="' . $qty . '", updated_at="' . $date . '" WHERE
					ID ="' . $idd . '"';
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if ($result) {
	?>
		<script>
			swal({
				title: "Good job!",
				text: "Updated successfully",
				icon: "success",
			});
			// window.location = "inventory.php";
		</script>
	<?php
	header("refresh:2,url=inventory.php");
	}
	?>

</body>

</html>