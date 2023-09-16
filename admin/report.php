<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM transaction';
$result = mysqli_query($con, $sql);


include '../include/navigation.php';

include '../include/header.php';
?>


<!------main-content-start----------->

<div class="container">
  <div class="mt-3">
    <h4>Report</h4>
  </div>
  
  <form action="" method="post" class="">
  <div class="mb-3">
    <label class="form-label">From Date: </label>
    <input type="date" class="form-control" name="fromdate">
    <label class="form-label">To Date: </label>
    <input type="date" class="form-control" name="todate">
  </div>
  <div class="flex">
  <input class="btn btn-primary" type="submit" value="Submit">
  </div>
 <br>
  </form>
  <table class="table table-bordered">
                    <tr style="background-color: #DAF5FF">
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Prices</th>
                        <th scope="col">Total Prices</th>
                        <th scope="col">Date Post</th>
                    </tr>

                    <?php if (isset($_POST['fromdate'])) {
                        $dateFrom = $_POST['fromdate'];
                        $dateTo = $_POST['todate'];
                    ?>
                        <!-- ========Print report================= -->
                        <div class="input-group mb-3">
                            <form method="post" action="print-report.php" class="form-control" style="border:none;">
                                <input type="hidden" name="fromdate" value="<?php echo $dateFrom; ?>">
                                <input type="hidden" name="todate" value="<?php echo $dateTo; ?>">
                                <div class="input-group-append">
                                    <input type="submit" value="Print Report" class="btn btn-outline-primary">
                                </div>
                            </form>
                        </div>
                        <!-- =================================== -->
                        <?php

                        $no = 1;
                        $sum_qty = 0;
                        $sum_total_price = 0;


                        $report = "SELECT * FROM transaction_detail 
                        join product on transaction_detail.product_id=product.id
                        join transaction on transaction_detail.transac_id=transaction.id
                        join customer on transaction.cust_id=customer.cus_id";
                        $result = mysqli_query($con, $report);

                        while ($row = mysqli_fetch_assoc($result)) {


                            if ($row['created_at'] >= $dateFrom and $row['created_at'] <= $dateTo) {
                                $sum_qty += $row['qty'];
                                $sum_total_price += $row['price'];
                        ?>

                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['pro_name']; ?></td>
                                    <td><?php echo $row['qty']; ?> Pcs</td>
                                    <td><?php echo $row['price']; ?> ដុល្លា</td>
                                    <td><?php echo $row['price'] * $row['qty']; ?> ដុល្លា</td>
                                    <td width=20% style="font-size: 15px;"><?php echo $row['created_at']; ?></td>
                                </tr>

                        <?php
                                $no++;
                            } //close filter

                        } //close while loop database
                        //echo $sum;
                        ?>
                        <tr>
                            <td colspan="6" align="right">Total Quantity From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
                            <td style="font-size: 16px;" class="text text-info"><?php echo $sum_qty . " គ្រឿង"; ?></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right">Total Amount From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
                            <td style="font-size: 16px;" class="text text-primary"><?php echo $sum_total_price . " ដុល្លា"; ?></td>
                        </tr>

                    <?php
                    } // close if isset form post
                    ?>

                </table>
  
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