<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Delete page</title>
</head>

<body>

	<?php
	session_start();
	include("../check-login.php");
	include("../connection.php");

	if (isset($_GET['id'])) {
		$del_id = $_GET['id'];

		$delete = "DELETE FROM product WHERE id ='$del_id'";

		$result = mysqli_query($con, $delete);
		if ($result) {
	?>
			<!-- Sweetalert framework -->
			<script>
				
			</script>
	<?php
			header("Location: product.php");
		} else {
			echo "delete fail";
		}
	}

	?>
</body>

</html>