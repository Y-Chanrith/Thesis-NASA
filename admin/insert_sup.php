<?php 
	session_start();
	include("../check-login.php");
	include("../connection.php");

	if(isset($_POST['name'])){
		$name = htmlspecialchars($_POST['name']);
		$phone = $_POST['phone'];
		$province = $_POST["province"];

			$sql = "INSERT INTO `supplier`(company_name, phone, location_id) VALUES('{$name}','{$phone}','{$province}') ";
		$result = mysqli_query($con, $sql);
		
		if($result){
			header("Location: supplier.php");
		}else{
			echo "Error!";
		}
    }

 ?>

<?php 
include '../include/navigation.php';
include '../include/header.php';

$sql2 = "SELECT DISTINCT location_id, province FROM location order by province asc";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='province'>
        <option disabled selected>Select Province</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['location_id']."'>".$row['province']."</option>";
  }

$sup .= "</select>";
?>


<!------main-content-start----------->

<div class="container mt-3">
	<form method="post" action="" class="myform" class="form-group" enctype="multipart/form-data">
		<div class="jumbotron" style="background-color: #F8F8F6 ;">
			<h3 class="text-center text-primary mb-3">Insert Supplier</h3>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Supplier Name</label>
					<input type="text" class="form-control" name="name" placeholder="Supplier Name" required>
				</div>
				<div class="form-group col-md-6">
					<label for="input">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="Phone" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="input">Province</label>
					<?php echo $sup; ?>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="supplier.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Add Supplier</button>
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

