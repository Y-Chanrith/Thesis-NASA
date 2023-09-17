<?php
session_start();
include '../check-login.php';
include '../connection.php';
include '../include/navigation.php';

include '../include/header.php';
?>

<!------main-content-start----------->
<div class="main-content" style="background-color: #F8F8F6 ;">
	<div class="form-row">
		<!-- Customer record -->
		<div class="form-group col-md-3">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customers</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								<?php
								$query = "SELECT COUNT(*) FROM customer";
								$result = mysqli_query($con, $query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result)) { ?>
									<span class="text-primary"><?php echo "$row[0]"; ?></span>
								<?php }

								?> Record(s)
							</div>
						</div>
						<div class="col-auto" style="color: #D3D3D3;">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div>
						<a href="customer.php" style="font-size: 10px; color: blue; float: right; text-decoration: underline;">view Customer</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Supplier record -->
		<div class="form-group col-md-3">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Supplier</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								<?php
								$query = "SELECT COUNT(*) FROM supplier";
								$result = mysqli_query($con, $query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result)) { ?>
									<span class="text-warning"><?php echo "$row[0]"; ?></span>
								<?php }
								?> Record(s)
							</div>
						</div>
						<div class="col-auto" style="color: #D3D3D3;">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div>
						<a href="supplier.php" style="font-size: 10px; color: blue; float: right; text-decoration: underline;">view Suppliers</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Employee record -->
		<div class="form-group col-md-6">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Employees</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								<?php
								$query = "SELECT COUNT(*) FROM employee";
								$result = mysqli_query($con, $query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result)) { ?>
									<span class="text-success"><?php echo "$row[0]"; ?></span>
								<?php }
								?> Record(s)
							</div>
						</div>
						<div class="col-auto" style="color: #D3D3D3;">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div>
						<a href="employee.php" style="font-size: 10px; color: blue; float: right; text-decoration: underline;">view Employee</a>
					</div>
				</div>
			</div>
		</div>
		<!-- User record -->

		<!-- Product record -->
		<div class="col-md-6 mb-3">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">

						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
										<?php
										$query = "SELECT COUNT(*) FROM product";
										$result = mysqli_query($con, $query) or die(mysqli_error($con));
										while ($row = mysqli_fetch_array($result)) { ?>
											<span class="text-info"><?php echo "$row[0]"; ?></span>
										<?php }
										?> Record(s)
									</div>
								</div>
							</div>
						</div>

						<div class="col-auto" style="color: #D3D3D3;">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
					<div>
						<a href="product.php" style="font-size: 10px; color: blue; float: right; text-decoration: underline;">view Product</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Sale record -->
		<div class="form-group col-md-6">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sale</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								<?php
								$query = "SELECT COUNT(*) FROM transaction";
								$result = mysqli_query($con, $query) or die(mysqli_error($con));
								while ($row = mysqli_fetch_array($result)) { ?>
									<span class="text-success"><?php echo "$row[0]"; ?></span>
								<?php }
								?> Record(s)
							</div>
						</div>
						<div class="col-auto" style="color: #D3D3D3;">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div>
						<a href="sale.php" style="font-size: 10px; color: blue; float: right; text-decoration: underline;">view Sale</a>
					</div>
				</div>
			</div>
		</div>
		<!-- enf sale record -->

	</div>
</div>
<div class="main-content" style="background-color: #F8F8F6 ;">
	<!-- Employee ROW -->
	<div class="form-row">
		<!-- Recent Students -->
		<div class="container-fluid pt-2 px-4">
			<div class="bg-white text-center rounded p-4 shadow">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h6 class="mb-0">Recent Salse</h6>
					<a href="" class="btn btn-primary">View All</a>
				</div>
				<div class="table-responsive">
					<table class="table text-start align-middle table-bordered table-hover mb-0">
						<thead>
							<tr class="text-primary">
								<th scope="col">N0</th>
								<th scope="col">Date</th>
								<th scope="col">Invoice</th>
								<th scope="col">Customer</th>
								<th scope="col">Amount</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>01 Jan 2045</td>
								<td>INV-0123</td>
								<td>Jhon Doe</td>
								<td>$123</td>
								<td>Paid</td>
								<td><a class="btn btn-sm btn-primary" href="">View</a></td>
							</tr>
							<tr>
								<td>1</td>
								<td>01 Jan 2045</td>
								<td>INV-0123</td>
								<td>Jhon Doe</td>
								<td>$123</td>
								<td>Paid</td>
								<td><a class="btn btn-sm btn-primary" href="">View</a></td>
							</tr>
							<tr>
								<td>1</td>
								<td>01 Jan 2045</td>
								<td>INV-0123</td>
								<td>Jhon Doe</td>
								<td>$123</td>
								<td>Paid</td>
								<td><a class="btn btn-sm btn-primary" href="">View</a></td>
							</tr>
							<tr>
								<td>1</td>
								<td>01 Jan 2045</td>
								<td>INV-0123</td>
								<td>Jhon Doe</td>
								<td>$123</td>
								<td>Paid</td>
								<td><a class="btn btn-sm btn-primary" href="">View</a></td>
							</tr>
							<tr>
								<td>1</td>
								<td>01 Jan 2045</td>
								<td>INV-0123</td>
								<td>Jhon Doe</td>
								<td>$123</td>
								<td>Paid</td>
								<td><a class="btn btn-sm btn-primary" href="">View</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Recent Student End -->

	</div>
</div>
<!------main-content-end----------->

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
include '../connection.php';
?>