<?php
ob_start();
session_start();
include("../check-login.php");
include("../connection.php");
$pic_uploaded = 0;

$sql = "SELECT DISTINCT C_NAME, CATEGORY_ID FROM category order by C_NAME asc";
$result = mysqli_query($con, $sql) or die("Bad SQL: $sql");

$opt = "<select class='form-control' name='category' required>
        <option value='' disabled selected hidden>Select Category</option>";
while ($row = mysqli_fetch_assoc($result)) {
	$opt .= "<option value='" . $row['CATEGORY_ID'] . "'>" . $row['C_NAME'] . "</option>";
}

$opt .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($con, $sql2) or die("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier'>
        <option disabled selected>Select Supplier</option>";
while ($row = mysqli_fetch_assoc($result2)) {
	$sup .= "<option value='" . $row['SUPPLIER_ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
}

$sup .= "</select>";



include '../include/navigation.php';
include '../include/header.php';
$edit_id = $_GET['id'];

$query = "SELECT * FROM product join category on product.CATEGORY_ID=category.CATEGORY_ID 
								join supplier on product.SUPPLIER_ID=supplier.SUPPLIER_ID WHERE id = '$edit_id' ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($result)) {
?>

	<!------main-content-start----------->

	<div class="container mt-3">
		<form method="post" action="" class="myform" class="form-group" enctype="multipart/form-data">
			<div class="jumbotron" style="background-color: #F8F8F6 ;">
				<h3 class="text-center text-primary mb-3">Update Product Page</h3>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="input">Product Name</label>
						<input type="text" class="form-control" name="pro_name" placeholder="" value="<?php echo $row['pro_name']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">Product Category</label>
						<a href="#addCategoryModal" class="btn btn-sm btn-outline-secondary float-right" data-toggle="modal">
						<i class="fas fa-plus"></i>
					</a>
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
						<input type="text" class="form-control" name="pro_brand" placeholder="" value="<?php echo $row['brand']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">Product description</label>
						<textarea class="form-control" name="description" placeholder="Description"><?php echo $row['description']; ?></textarea>
					</div>
					<div class="form-group col-md-4">
						<label for="input">Product Price</label>
						<input type="text" class="form-control" name="pro_price" placeholder="" value="<?php echo $row['price']; ?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="input">Quantity Stock</label>
						<input type="number" class="form-control" name="stock" placeholder="" value="<?php echo $row['stock']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="input">Date Stock In</label><br>
						<input type="datet" class="form-control" placeholder="Date Stock In" name="datestock" value="<?php echo $row['date_in_stock']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="img">Choose image:</label>
						<input type="file" id="img" name="image">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12 text-right mt-3">
						<button class="btn btn-danger btn-md">
							<a href="product.php" style="color: #F8F8F6;">Cancel</a>
						</button>
						<button type="submit" class="btn btn-primary btn-md">Update Product</button>
					</div>

				</div>
			<?php } ?>
		</form>

	</div>

	</div>
	</div>

	<!------main-content-end----------->
	
	</div>
	<!-- ===========modal=========== -->
<div class="modal fade" tabindex="-1" id="addCategoryModal" role="dialog">
    <div class="modal-dialog" role="document">
    <form method="post" action="add_category_modal.php" id="customer_form"class="myform form-group" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category" placeholder="Insert Category" required>
          </div>
        <div class="modal-footer bg-white">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<!-- ===========modal=========== -->
	</div>
	<?php
	 include '../include/footer.php';
	?>
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
	if (isset($_POST["pro_name"])) {
		$name = $_POST["pro_name"];
		$brand = $_POST["pro_brand"];
		$des = $_POST["description"];
		$price = $_POST["pro_price"];
		$stock = $_POST["stock"];
		$date = $_POST["datestock"];
		$cname = $_POST["category"];
		$sup = $_POST["supplier"];
		$image = time() . $_FILES["image"]['name'];

		if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/thesis/image/' . $image)) 
		{
			$target_file = $_SERVER['DOCUMENT_ROOT'] . '/thesis/image/' . $image;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$picname = basename($_FILES['image']['name']);
			$photo = time() . $picname;
			if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
			?>
				<script>
					alert("Please upload photo having extension .jpg/ .jpeg/ .png");
				</script>
			<?php
			} else if ($_FILES['pic']["size"] > 20000000) {
			?>
				<script>
					alert("Ur photo exceed the size of 2 mb");
				</script>
			<?php
			} else {
				$pic_uploaded = 1;
			}
		}

		if($pic_uploaded == 1){
			$update = "UPDATE product SET pro_name='$name',brand='$brand',description='$des',price='$price',stock='$stock',date_in_stock='$date',category_id='$cname', SUPPLIER_ID='$sup', image='$image' WHERE id = $edit_id";
			$execute = mysqli_query($con, $update);
			if ($execute) {
				header("Location: product.php");
			} else {
				echo 'Update failed!!!';
			}
		}
		
	}
	ob_end_flush();
	?>