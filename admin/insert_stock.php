<?php
	session_start();
	include("../check-login.php");
	include("../connection.php");

include '../include/navigation.php';
include '../include/header.php';
?>
<!------main-content-start----------->

<div class="container mt-3">
	<form method="post" action="add_stock.php" class="myform" class="form-group" enctype="multipart/form-data">
		<div class="jumbotron" style="background-color: #F8F8F6 ;">
			<h3 class="text-center text-primary mb-3">Insert Stock Product</h3>
			<div class="form-row">
				<div class="form-group col-md-3">
                <input type="hidden" name="current_stock">
                    <?php
                         $sql="select * from product";
                         // $product= mysqli_query($con, $sql);
                         $products = mysqli_query($con, $sql) or die(mysqli_error($con));
                    ?>
					<label for="input">Product</label>
                    <select name="product_id" id="product"class="form-control">
                        <option value="">Select Product</option>
                        <?php
                           while ($product = mysqli_fetch_assoc($products)):
                        ?>
                            <option value="<?= $product['id']; ?>"id="option<?=$product['id'] ?>"data-stock="<?=$product['stock'] ?>"><?= $product['pro_name'] ?></option>
                        <?php endwhile ?>
                    </select>

				</div>
				<div class="form-group col-md-3">
					<label for="input">Purchase Price</label>
					<input type="text" class="form-control" name="price" placeholder="" required>
				</div>
                <div class="form-group col-md-3">
					<label for="input">Current Stock</label>
					<input type="text" class="form-control" name="current_stock" id="current_stock"value="" readonly>
				</div>
				<div class="form-group col-md-3">
					<label for="input">Add Stock</label>
                    <input type="text" class="form-control" id="qty"name="qty" placeholder="" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12 text-right mt-3">
				<button  class="btn btn-danger btn-md">
					<a href="stock.php" style="color: #F8F8F6;">Cancel</a>
				</button>
					<button type="submit" class="btn btn-primary btn-md">Add Stock</button>
				</div>
		</div>
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
        $('#product').on('change',function(){
            var current_stock=$(this).find('#option'+$(this).val()).attr('data-stock');
            // alert(current_stock);
            $('#current_stock').val(current_stock);
        })

        $('#qty').on('keyup',function(){
            $('#current_stock').val(Number($('#current_stock').val())+Number( $(this).val()));

        });



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

