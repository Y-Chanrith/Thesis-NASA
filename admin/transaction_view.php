<?php 
	session_start();
	include("../check-login.php");
	include("../connection.php");
 ?>
 <?php
if($_GET['customer_id']){
    $customer_sql="select firstname,lastname,cus_id,phone from customer where cus_id=".$_GET['customer_id'];
    $cus_re = mysqli_query($con, $customer_sql);
    $customer=$cus_re->fetch_assoc();
}
          
 
?>

<?php 
include '../include/navigation.php';

include '../include/header.php';
?>


<!------main-content-start----------->

<div class="container mt-3">
	<form method="post" action="" class="myform" class="form-group">
  <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                    Sales and Inventory
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?=date('Y-m-d H:i:sa') ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    Name: <?=$customer['firstname'].' '.$customer['lastname']  ?>
                  </h6>
                  <h6>
                    Phone: <?=$customer['phone'] ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php  ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: <?php  ?>
                  </h6>
                  <h6>
                    <?php  ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
            <?php  
          if($_GET['transac_id']){
            $query = 'SELECT * from transaction_detail 
            inner join product on transaction_detail.product_id=product.id
            where transaction_detail.transac_id='.$_GET['transac_id'];
            $result = mysqli_query($con, $query);
            // var_dump($result->fetch_all());
        }
        $subtotal=0;
        $qty=0;
            while ($row = mysqli_fetch_assoc($result)):
                $subtotal+=$row['price'] ;
                $qty+=$row['qty'] ;
        ?>
        <tr>
            <td><?= $row['pro_name'] ?></td>
            <td><?= $row['qty'] ?> Pcs</td>
            <td>$ <?= $row['price'] ?></td>
            <td>$ <?= $row['price']*$row['qty']?></td>
        </tr>
        <?php endwhile; ?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                        <?php ?>
                  </h4>
                  <hr>
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">$ <?=$subtotal  ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Qty</td>
                      <td class="text-right"><?=$qty ?> Pcs</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="text-right"><b>$ <?=$subtotal  ?></b></td>
                    </tr>
                  </table>
                  <hr>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
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

