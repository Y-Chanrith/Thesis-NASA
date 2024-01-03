<?php
ob_start();
session_start();
include("../check-login.php");
include("../connection.php");

include '../include/navigation.php';
include '../include/header.php';

$sql = "SELECT DISTINCT role, role_id FROM role";
$result = mysqli_query($con, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='role'>
        <option disabled selected>Select role</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['role_id']."'>".$row['role']."</option>";
  }

$opt .= "</select>";

$edit_id = $_GET['id'];

$query = "SELECT * FROM users join role on users.role_id=role.role_id WHERE id = '$edit_id' ";
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
			<h3 class="text-center text-primary mb-3">Update Users</h3>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Username</label>
					<input type="text" class="form-control" name="user_name" placeholder="input Username" value="<?php echo $row['username']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="input">Password</label>
					<input type="password" class="form-control" name="password" placeholder="input password" value="<?php echo $row['password']; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Role</label>
					<!-- <input type="text" class="form-control" name="phone" placeholder="" value="<?php echo $row['phone']; ?>"> -->
                    <?php echo $opt; ?>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="user.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Update User</button>
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
	if (isset($_POST["user_name"])) {
		$user_name = $_POST["user_name"];
		$password = $_POST["password"];
		$role = $_POST["role"];

		$update = "UPDATE users SET username='$user_name',password='$password',role_id='$role' WHERE id = $edit_id";
		$execute = mysqli_query($con, $update);
		if ($execute) {
			header("Location: user.php");
		} else {
			echo 'Update failed!!!';
		}
	}
	ob_end_flush();
	?>