<?php
//   require('../admin/session.php');
//   confirm_logged_in();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>crud dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="../fontawesome/css/all.min.css">

	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>
	<div class="wrapper">

		<div class="body-overlay"></div>

		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header">
				<h3><img src="../image/NASA-Computer.png" class="img-fluid" style="border: 1px solid #47A3FF; border-radius: 50%;" />
					<span​ style="font-family: Khmer OS Muol Light;"><span style="color:red;">NASA</span> <span style="color:blue;">COMPUTER</span>
				</h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/dashboard.php"?"active":""?>">
					<a href="../admin/dashboard.php"><i class="fa-solid fa-gauge" style="font-size: 20px; "></i>
						Dashboard </a>
				</li>

				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/product.php"?"active":""?>">
					<a href="../admin/product.php">
						<i class="fa-solid fa-shop" style="font-size: 20px; "></i>Products
					</a>
				</li>


				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/customer.php"?"active":""?> dropdown">
					<a href="../admin/customer.php">
						<i class="fas fa-user-check" style="font-size: 20px; "></i>Customers
					</a>
				</li>

				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/inventory.php"?"active":""?> dropdown">
					<a href="../admin/inventory.php">
						<i class="fa-solid fa-warehouse" style="font-size: 20px; "></i>Inventory
					</a>
				</li>

				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/supplier.php"?"active":""?> dropdown">
					<a href="../admin/supplier.php">
						<i class="fa-solid fa-truck-field" style="font-size: 20px; "></i>Supplier
					</a>
				</li>

				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/employee.php"?"active":""?> dropdown">
					<a href="../admin/employee.php">
						<i class="fa-solid fa-users-gear" style="font-size: 20px;"></i>Employee
					</a>
				</li>

				<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/sale.php"?"active":""?>">
					<a href="../admin/sale.php" class="">
						<i class="fa-solid fa-cart-arrow-down" style="font-size: 20px;"></i>Sales
					</a>
				</li>

				<!-- <li class="dropdown">
					<a href="../admin/store_data_shop.php">
						<i class="fas fa-window-maximize" style="font-size: 20px;"></i>NASA Info
					</a>
				</li> -->


				<li class="dropdown">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fa-solid fa-chart-line" style="font-size: 20px;"></i>Reports
					</a>
					<ul class="collapse list-unstyled menu pl-4" id="homeSubmenu1">
						<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/stock_report.php"?"active":""?>"><a href="../admin/stock_report.php">
								<i class="far fa-file-alt" style="color: #ffffff; font-size: 20px;"></i>Stock Report</a>
						</li>
						<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/sale_report.php"?"active":""?>"><a href="../admin/sale_report.php">
								<i class="fas fa-file-alt" style="color: #ffffff; font-size: 20px;"></i>Sale Report</a>
								<!-- <i class="fas fa-file-alt"></i> -->
						</li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fa-solid fa-gear" style="font-size: 20px;"></i>Setting
					</a>
					<ul class="collapse list-unstyled menu pl-4" id="homeSubmenu2">
						<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/user.php"?"active":""?>"><a href="../admin/user.php">
						<i class="fas fa-users" style="color: #ffffff; font-size: 20px;"></i>USER ACCOUNT</a></li>
						<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/backup_data.php"?"active":""?>"><a href="../admin/backup_data.php">
								<i class="fas fa-hdd" style="color: #ffffff; font-size: 20px;"></i>BACKUP DATA</a></li>
						<li class="<?= $_SERVER["REQUEST_URI"]=="/Thesis/admin/store_data_shop.php"?"active":""?>"><a href="../admin/store_data_shop.php">
								<i class="fas fa-info-circle" style="color: #ffffff; font-size: 20px;"></i>NASA INFOMATION</a></li>
								<!-- <i class="fas fa-info-circle" style="color: #ffffff;"></i> -->
						<!-- <li><a href="#">layout 3</a></li> -->
					</ul>
				</li>
				<!-- <i class="fas fa-hdd" style="color: #ffffff;"></i> -->
			</ul>
		</div>

		<!-------sidebar--design- close----------->