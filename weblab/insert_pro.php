<?php 
include '../connection.php';
include '../include/navigation.php';

include '../include/header.php';
?>


<!------main-content-start----------->

<div class="container-lg bg-light rounded m-5 p-5" style="min-height: 100vh;">
	<form class="pd-5 bg-white mr-5 ml-5">
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

<!----add-modal start--------->
<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Products</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Product Name</label>
					<input type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Category</label>
					<input type="emil" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Brand</label>
					<textarea class="form-control" required></textarea>
				</div>
				<div class="form-group">
					<label>Cost</label>
					<input type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Stocks</label>
					<input type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Unit</label>
					<select name="unit" id="unit">
						<option value="Select">Select</option>
						<option value="PCS">PCS</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success">Add</button>
			</div>
		</div>
	</div>
</div>

<!----edit-modal end--------->

<!----edit-modal start--------->
<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Employees</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="emil" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" required></textarea>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="form-control" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
</div>

<!----edit-modal end--------->

<!----delete-modal start--------->
<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Employees</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Records</p>
				<p class="text-warning"><small>this action Cannot be Undone,</small></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success">Delete</button>
			</div>
		</div>
	</div>
</div>

<!----edit-modal end--------->

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
include '../connection.php';
?>