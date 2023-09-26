<?php
ob_start();
session_start();
include("../check-login.php");
include("../connection.php");

include '../include/navigation.php';
include '../include/header.php';
$edit_id = $_GET['cus_id'];

$query = "SELECT * FROM customer WHERE cus_id = '$edit_id' ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($result)) {
?>

	<!------main-content-start----------->

	<div class="container mt-3">
	<form method="post" action="" class="myform" class="form-group">
		<div class="jumbotron" style="background-color: #F8F8F6 ;">
		<div class="form-row">
				<div class="form-group col-md-6" style="display: flex; justify-content: end;" >
					<img src="../image/NASA-Computer.png" alt="Nasa Computer" style="width: 100px;">
				</div>
				<div class="form-group col-md-6" style="display: flex; align-items: center;" >
					<h6><span class="text-danger">NASA</span> <span class="text-primary">Computer</span></h6>
				</div>
			</div>
			<h3 class="text-center text-primary mb-3">Update Customer </h3>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">First Name</label>
					<input type="text" class="form-control" name="firstname" placeholder="" value="<?php echo $row['firstname']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="input">Last Name</label>
					<input type="text" class="form-control" name="lastname" placeholder="" value="<?php echo $row['lastname']; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="" value="<?php echo $row['phone']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="input">Address</label>
					<input type="text" class="form-control" name="address" placeholder="" value="<?php echo $row['address']; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="customer.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Update Customer</button>
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
	if (isset($_POST["firstname"])) {
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];


		$update = "UPDATE customer SET firstname='$fname',lastname='$lname',phone='$phone',address='$address' WHERE cus_id = $edit_id";
		$execute = mysqli_query($con, $update);
		if ($execute) {
			header("Location: customer.php");
		} else {
			echo 'Update failed!!!';
		}
	}
	ob_end_flush();
	?>