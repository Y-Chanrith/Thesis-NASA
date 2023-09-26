<?php
ob_start();
session_start();
include("../check-login.php");
include("../connection.php");

include '../include/navigation.php';
include '../include/header.php';
$edit_id = $_GET['id'];

$query = "SELECT * FROM tbl_store WHERE id = '$edit_id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($result)) {
?>

	<!------main-content-start----------->

	<div class="container mt-3">
		<form method="post" action="" class="myform" class="form-group" enctype="multipart/form-data">
			<div class="jumbotron" style="background-color: #F8F8F6 ;">
				<h3 class="text-center text-primary mb-3">Update Store Info</h3>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="input">Khmer Name</label>
						<input type="text" class="form-control" name="kh_name" placeholder="" value="<?php echo $row['kh_name']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">English Name</label>
						<input type="text" class="form-control" name="en_name" placeholder="" value="<?php echo $row['en_name']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">Email</label>
						<input type="text" class="form-control" name="email" placeholder="" value="<?php echo $row['email']; ?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="input">Phone Number</label>
						<input type="text" class="form-control" name="phone" placeholder="" value="<?php echo $row['phone']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">Address</label>
						<input type="text" class="form-control" name="address" placeholder="" value="<?php echo $row['address']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">description</label>
						<input type="text" class="form-control" name="description" placeholder="" value="<?php echo $row['description']; ?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12 text-right mt-3">
						<button class="btn btn-danger btn-md">
							<a href="store_data_shop.php" style="color: #F8F8F6;">Cancel</a>
						</button>
						<button type="submit" class="btn btn-primary btn-md">Update Info</button>
					</div>

				</div>
			<?php } ?>
		</form>

	</div>

	</div>
	</div>

	<!------main-content-end----------->
	<?php
	// include '../include/footer.php';
	?>
	</div>
	</div>
	<!-------complete html----------->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".xp-menubar").on('click', function() {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function() {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});
	</script>

	</body>

	</html>

	<?php
	if (isset($_POST["kh_name"])) {
		$kh_name = $_POST["kh_name"];
		$en_name = $_POST["en_name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$des = $_POST["description"];

			$update = "UPDATE tbl_store SET kh_name='$kh_name',en_name='$en_name',email='$email',phone='$phone',address='$address',description='$des' WHERE id = $edit_id";
			$execute = mysqli_query($con, $update);
			if ($execute) {
				header("Location: store_data_shop.php");
			} else {
				echo 'Update failed!!!';
			}
		}

	ob_end_flush();
	?>