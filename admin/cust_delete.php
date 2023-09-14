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

	if (isset($_GET['cus_id'])) {
		$del_id = $_GET['cus_id'];

		$delete = "DELETE FROM customer WHERE cus_id ='$del_id'";

		$result = mysqli_query($con, $delete);
		if ($result) {
	?>
			<!-- Sweetalert framework -->
			<script>
				swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this imaginary file!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							swal("Poof! Your imaginary file has been deleted!", {
								icon: "success",
							});
						} else {
							swal("Your imaginary file is safe!");
						}
					});
			</script>
	<?php
			header("Location: customer.php");
		} else {
			echo "delete fail";
		}
	}

	?>
</body>

</html>