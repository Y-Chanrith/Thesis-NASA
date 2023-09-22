<?php
// session_start();
include '../connection.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Invoice Template Design</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<?php
		$sql_query = "SELECT * FROM customer 
		join transaction on customer.cus_id=transaction.cust_id
		where cus_id=". $_GET['customer_id'];
		$result = mysqli_query($con, $sql_query);
		$rows = mysqli_fetch_assoc($result);
	?>
	<div class="wrapper">
		<div class="invoice_wrapper">
			<div class="header">
				<div class="logo_invoice_wrap">
					<div class="logo_sec">
						<img src="../image/NASA-Computer.png" alt="code logo" width="100px">
						<div class="title_wrap">
							<p class="title bold"><span style="color:red;">NASA </span>COMPUTER</p>
							<p class="sub_title" style="font-family: Kh Ang ChittBous;">ណាស្សា កុំព្យូទ័រ</p>
						</div>
					</div>
					<div class="invoice_sec">
						<p class="invoice bold">INVOICE</p><br>
						<p class="invoice_no">
							<span class="bold">Invoice</span>
							<span><?= $rows['id'] ?></span>
						</p>
						<p class="date">
							<span class="bold">Date</span>
							<span><?= $rows['created_at'] ?></span>
						</p>
					</div>
				</div>
				<div class="bill_total_wrap">
					<div class="bill_sec">
						<p>Bill To : <span class="bold name"><?= $rows['firstname'] ?> <?= $rows['lastname'] ?></span> </p>
						<p>Phone : <?= $rows['phone'] ?></p>
						<p>Address : <?= $rows['address'] ?></p>
						<!-- <span>
			           123 walls street, Townhall<br/>
			           +111 222345667
			        </span> -->
					</div>
					<!-- <div class="total_wrap">
						<p>Total Due</p>
						<p class="bold price">USD: $1200</p>
					</div> -->
				</div>
			</div>
			<div class="body">
				<?php
				$total_qty = 0;
				$total_amount = 0;
				$sql = "select * from transaction_detail
                        inner join product on transaction_detail.product_id=product.id
                        where transac_id =" . $_GET['id'];
				$result = mysqli_query($con, $sql);
				
				// var_dump($result);

				?>
				<div class="main_table">
					<div class="table_header">
						<div class="row" style="background-color: red ; ">
							<div class="col col_no" style="width: 10%;">No.</div>
							<div class="col col_des">ITEM NAME</div>
							<div class="col col_price">PRICE</div>
							<div class="col col_qty">QTY</div>
							<div class="col col_total">TOTAL</div>
							<!-- <table>
								<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
							</table> -->
						</div>
					</div>
					<div class="table_body">
						<?php $i = 1;
						while ($row = mysqli_fetch_assoc($result)) :
						?>
							<div class="row">
								<div class="col col_no" style="width: 10%;">
									<p><?= $i++ ?></p>
								</div>
								<div class="col col_des">
									<p class="bold"><?= $row['pro_name'] ?></p>

								</div>
								<div class="col col_price">
									<p>$ <?= number_format($row['price'],2) ?></p>
								</div>
								<div class="col col_qty">
									<p><?= $row['qty'] ?></p>
								</div>
								<div class="col col_total">
									<p>$ <?= number_format($row['qty'] * $row['price'],2) ?></p>
								</div>
							</div>
						<?php
						$total_qty += $row['qty'];
						$total_amount += ($row['qty']*$row['price']);


					endwhile; ?>
					</div>
				</div>
				<div class="paymethod_grandtotal_wrap">
					<div class="paymethod_sec">
						<p class="bold">Payment Method</p>
						<p>We accept Cash and Bank Transfer(ABA, ACLEDA, ...)</p>
					</div>
					<div class="grandtotal_sec">
						<br>
						<hr>
						<br>
						<p class="bold">
							<span>SUB TOTAL</span>
							<span>$<?= number_format($total_amount,2);?></span>
						</p>
						<p>
							<span>Total Quantity</span>
							<span><?=$total_qty;?> Item</span>
						</p>
						<p class="bold">
							<span>Grand Total</span>
							<span>$<?=number_format($total_amount,2);?></span>
						</p>
					</div>
				</div>

			</div>
			<div class="footer">
				<p>Thank you and Best Wishes</p>
				<div class="terms">
					<p class="tc bold">Terms & Coditions</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt error aliquid quis eius!</p>
				</div>
			</div>
		</div>
	</div>


</body>

</html>