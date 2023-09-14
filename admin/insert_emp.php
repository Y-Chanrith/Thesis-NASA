<?php 
	session_start();
	include("../check-login.php");
	include("../connection.php");
	if(isset($_POST['emp_name'])){
		$emp_name = htmlspecialchars($_POST['emp_name']);
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$role = $_POST["role"];

		$sql = "INSERT INTO employee(employee_name,gender,phone,address,role) 
		VALUES('$emp_name', '$gender', '$phone', '$address','$role')";
		$result = mysqli_query($con, $sql);
		
		if($result){
			header("Location: employee.php");
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
			<h3 class="text-center text-primary mb-3">Insert Employee Page</h3>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Employee Name</label>
					<input type="text" class="form-control" name="emp_name" placeholder="">
				</div>
				<div class="form-group col-md-6">
					<label for="input">Gender</label>
					<input type="text" class="form-control" name="gender" placeholder="">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="input">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="">
				</div>
				<div class="form-group col-md-4">
					<label for="input">Address</label>
					<input type="text" class="form-control" name="address" placeholder="">
				</div>
				<div class="form-group col-md-4">
					<label for="input">Role</label>
					<input type="text" class="form-control" name="role" placeholder="">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="employee.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Add Employee</button>
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

