<?php 
	session_start();
	include("../check-login.php");
	include("../connection.php");
	if(isset($_POST['firstname'])){
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		$sql = "INSERT INTO customer(firstname,lastname,phone,address) VALUES('$firstname', '$lastname', '$phone', '$address')";
		$result = mysqli_query($con, $sql);
		
		if($result){
			header("Location: customer.php");
		}else{
			echo "Error!";
		}
	}
 ?>

<?php 
include '../include/navigation.php';

include '../include/header.php';
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
			<h3 class="text-center text-primary mb-3">Add Customer </h3>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">First Name</label>
					<input type="text" class="form-control" name="firstname" placeholder="" required>
				</div>
				<div class="form-group col-md-6">
					<label for="input">Last Name</label>
					<input type="text" class="form-control" name="lastname" placeholder="" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="" required>
				</div>
				<div class="form-group col-md-6">
					<label for="input">Address</label>
					<input type="text" class="form-control" name="address" placeholder="" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="customer.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Add Customer</button>
				</div>

		</div>
		
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

