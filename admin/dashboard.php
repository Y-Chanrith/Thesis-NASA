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
		<div class="form-group col-md-3">
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
		<div class="col-md-3 mb-3">
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

	</div>
</div>
<div class="main-content" style="background-color: #F8F8F6 ;">
	<!-- Employee ROW -->
	<div class="form-row">
		<!-- Center Body -->
		<div class="container-fluid pt-0 px-4">
			<div class="row g-4">
				<!-- Box 1 -->
				<div class="col-sm-12 col-md-6 col-xl-4 ">
					<div class="h-100 bg-white rounded p-4 shadow">
						<div class="d-flex align-items-center justify-content-between mb-2">

							<h6 class="mb-0 text-primary">Chart</h6>
							<!-- <a href="">Show All</a> -->
						</div>
						<div class="d-flex align-items-center border-bottom py-3">
							<!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
							<div class="w-100 ms-3">
								Card
								<h1>Bar Chart HTML</h1>
							</div>
						</div>
						<div class="d-flex align-items-center border-bottom py-3">
							<!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
							<div class="w-100 ms-3">
								Card
							</div>
						</div>
						<div class="d-flex align-items-center border-bottom py-3">
							<!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
							<div class="w-100 ms-3">
								Card
							</div>
						</div>
						<div class="d-flex align-items-center pt-3">
							<!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
							<div class="w-100 ms-3">
								Card
							</div>
						</div>
					</div>
				</div>

				<!-- Box 2 -->
				<div class="col-sm-12 col-md-6 col-xl-4">
					<div class="h-100 bg-white rounded p-4 shadow">
						<div class="d-flex align-items-center justify-content-between mb-4">
							<h6 class="mb-0 text-primary">Calender</h6>
							<!-- <a href="">Show All</a> -->
							
						</div>
						<div id="calender">
						<head>
    <style>
        table {
            border-collapse: collapse;
            background: white;
            color: black;
        }
          
        th,
        td {
            font-weight: bold;
        }
    </style>
</head>
  
<body>
    <!-- Here we are using attributes like
        cellspacing and cellpadding -->
  
    <!-- The purpose of the cellpadding is 
        the space that a user want between
        the border of cell and its contents-->
  
    <!-- cellspacing is used to specify the 
        space between the cell and its contents -->
    <h2 align="center" style="color: blue;">
        August 2023
    </h2>
    <br />
  
    <table bgcolor="lightgrey" align="center" 
        cellspacing="7" cellpadding="7">
  
        <!-- The tr tag is used to enter 
            rows in the table -->
  
        <!-- It is used to give the heading to the
            table. We can give the heading to the 
            top and bottom of the table -->
  
        <caption align="top">
            <!-- Here we have used the attribute 
                that is style and we have colored 
                the sentence to make it better 
                depending on the web page-->
        </caption>
  
        <!-- Here th stands for the heading of the
            table that comes in the first row-->
  
        <!-- The text in this table header tag will 
            appear as bold and is center aligned-->
  
        <thead>
            <tr>
                <!-- Here we have applied inline style 
                     to make it more attractive-->
                <th style="color: white; background: #FF7B7B ;">
                    Sun</th>
                <th style="color: white; background: #FF7B7B ;">
                    Mon</th>
                <th style="color: white; background: #FF7B7B ;">
                    Tue</th>
                <th style="color: white; background: #FF7B7B ;">
                    Wed</th>
                <th style="color: white; background: #FF7B7B ;">
                    Thu</th>
                <th style="color: white; background: #FF7B7B ;">
                    Fri</th>
                <th style="color: white; background: #FF7B7B ;">
                    Sat</th>
            </tr>
        </thead>
  
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1</td>
                <td>2</td>
            </tr>
            <tr></tr>
            <tr>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
            </tr>
            <tr>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
            </tr>
            <tr>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
            </tr>
            <tr>
                <td>31</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </tbody>
    </table>
						</div>
					</div>
				</div>

				<!-- Box 3 -->
				<div class="col-sm-12 col-md-6 col-xl-4">
					<div class="h-100 bg-white rounded p-4 shadow">
						<div class="d-flex align-items-center justify-content-between mb-4">
							<h6 class="mb-0 text-primary">Work Plane</h6>
							<!-- <a href="">Show All</a> -->
						</div>
						<div class="d-flex mb-2">
							<input class="form-control bg-white border-1" type="text" placeholder="Enter task">
							<button type="button" class="btn btn-primary ms-2">Add</button>
						</div>
						<div class="d-flex align-items-center border-bottom py-2">
							<input class="form-check-input m-0" type="checkbox">
							<div class="w-100 ms-3">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<span>Short task goes here...</span>
									<button class="btn btn-sm"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center border-bottom py-2">
							<input class="form-check-input m-0" type="checkbox">
							<div class="w-100 ms-3">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<span>Short task goes here...</span>
									<button class="btn btn-sm"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center border-bottom py-2">
							<input class="form-check-input m-0" type="checkbox" checked>
							<div class="w-100 ms-3">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<span><del>Short task goes here...</del></span>
									<button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center border-bottom py-2">
							<input class="form-check-input m-0" type="checkbox">
							<div class="w-100 ms-3">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<span>Short task goes here...</span>
									<button class="btn btn-sm"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center pt-2">
							<input class="form-check-input m-0" type="checkbox">
							<div class="w-100 ms-3">
								<div class="d-flex w-100 align-items-center justify-content-between">
									<span>Short task goes here...</span>
									<button class="btn btn-sm"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Center End -->

		<!-- Recent Students -->
		<div class="container-fluid pt-4 px-4">
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