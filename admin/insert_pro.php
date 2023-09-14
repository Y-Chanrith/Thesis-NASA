<?php 
	session_start();
	include("../check-login.php");
	include("../connection.php");
	$pic_uploaded = 0;
	if(isset($_POST['pro_name'])){
		$pro_name = htmlspecialchars($_POST['pro_name']);
		$pro_brand = $_POST['pro_brand'];
		$description = $_POST['description'];
		$pro_price = $_POST["pro_price"];
		$stock = $_POST["stock"];
		$image = time().$_FILES["image"]['name'];

		if(move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. '/thesis/image/' .$image)){
			$target_file = $_SERVER['DOCUMENT_ROOT']. '/thesis/image/' .$image;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$picname = basename($_FILES['image']['name']);
			$photo = time().$picname;
			if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
				?>
				<script>
					alert("Please upload photo having extension .jpg/ .jpeg/ .png");
				</script>
				<?php
			}
			else if($_FILES['pic']["size"] > 20000000){
				?>
				<script>
					alert("Ur photo exceed the size of 2 mb");
				</script>
				<?php
			}
			else{
				$pic_uploaded = 1;
			}

			}
		}

		if($pic_uploaded == 1){
			$sql = "INSERT INTO product(pro_name,brand,description,price,stock, image) 
		VALUES('$pro_name', '$pro_brand', '$description','$pro_price', '$stock', '$image')";
		$result = mysqli_query($con, $sql);
		
		if($result){
			header("Location: product.php");
		}else{
			echo "Error!";
		}
		}

 ?>

<?php 
include '../include/navigation.php';

include '../include/header.php';

$sql = "SELECT DISTINCT c_name, category_id FROM category order by c_name asc";
$result = mysqli_query($con, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['category_id']."'>".$row['c_name']."</option>";
  }

$opt .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier'>
        <option disabled selected>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>


<!------main-content-start----------->

<div class="container mt-3">
	<form method="post" action="insert_pro1.php?action=add" class="myform" class="form-group" enctype="multipart/form-data">
		<div class="jumbotron" style="background-color: #F8F8F6 ;">
			<h3 class="text-center text-primary mb-3">Insert Product Page</h3>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="input">Product Name</label>
					<input type="text" class="form-control" name="pro_name" placeholder="Product Name" required>
				</div>
				<div class="form-group col-md-4">
					<label for="input">Category</label>
					<?php
                        echo $opt;
                    ?>
				</div>
				<div class="form-group col-md-4">
					<label for="input">Supplier</label>
					<?php
                        echo $sup;
                     ?>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="input">Product Brand</label>
					<input type="text" class="form-control" name="pro_brand" placeholder="Product Brand">
				</div>
				<div class="form-group col-md-4">
					<label for="input">Product description</label>
					<textarea class="form-control" name="description" placeholder="Description"></textarea> 
				</div>
				<div class="form-group col-md-4">
					<label for="input">Product Price</label>
					<input type="text" class="form-control" name="pro_price" placeholder="Enter Price" required>
				</div>
				
			</div>

			<div class="form-row">
			<div class="form-group col-md-4">
					<label for="input">Quantity Stock</label>
					<input type="number" class="form-control" name="stock" placeholder="Enter Stock" required>
				</div>
				<div class="form-group col-md-4">
					<label for="input">Date Stock In</label>
					<input type="date" class="form-control" placeholder="Date Stock In" name="datestock" required>
				</div> 
				<div class="form-group col-md-4">
				<label for="img">Choose image:</label><br>
  				<input type="file" id="img" name="image">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="product.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Add Product</button>
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

