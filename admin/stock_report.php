<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM product';
$result = mysqli_query($con, $sql);

include '../include/navigation.php';
include '../include/header.php';
?>

<!------main-content-start----------->

<div class="container mt-5">
  <!-- ============ new form ============== -->
  <div class="row">
    <div class="col-sm-12 mb-2">
      <h2 class="ml-lg-2">STOCK REPORT</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 p-3" style="background-color: aliceblue;">
      <form action="" method="POST">
        <div class="row">
          <div class="col-sm-2" style="float: right;">
            From Date:
          </div>
          <div class="col-sm-3 pl-0">
            <input type="date" required name="fromdate" class="form-control">
          </div>
          <div class="col-sm-2">
            To Date:
          </div>
          <div class="col-sm-3 pl-0">
            <input type="date" required name="todate" class="form-control">
          </div>
          <div class="col-md-2 ">
            <input type="submit" class="btn btn-primary float-right ml-2" value="Filter">
            <a href="stock_report.php" class="btn btn-success float-right">Reset</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- ============ end new form ============ -->
  <hr>
  <table class="table table-striped">
    <!-- <tr style="background-color: #DAF5FF">
      <th scope="col">No</th>
      <th scope="col">Product Name</th>
      <th scope="col">In Stock</th>
      <th scope="col">Price Per Unit</th>
      <th scope="col">Total Price</th>
      <th scope="col">Date Post</th>
    </tr> -->

    <?php if (isset($_POST['fromdate'])) {
      $dateFrom = $_POST['fromdate'];
      $dateTo = $_POST['todate'];
    ?>
      <!-- ========Print report================= -->
      <div class="input-group mb-3">
        <form method="post" action="print_stock_report.php" class="form-control" style="border:none;">
          <input type="hidden" name="fromdate" value="<?php echo $dateFrom; ?>">
          <input type="hidden" name="todate" value="<?php echo $dateTo; ?>">
          <div class="input-group-append">
            <!-- <input type="submit" value="Print Report" class="btn btn-outline-primary"> -->
            <button type="submit" class="btn btn-secondary rounded"><i class="fas fa-print"></i> Print</button>
            <div class="btn btn-primary rounded ml-2" id="pdf"><i class="fas fa-file-pdf"></i> PDF</div>
          </div>
        </form>
      </div>
      <table class="table table-striped" id="print">
        <tr style="font-family: Khmer OS Siemreap; background-color: #FFFFFF;">
          <th colspan="3">
            ទិន្នន័យចាប់ពី: <?php echo $dateFrom; ?> ដល់: <?php echo $dateTo; ?>
          </th>
          <th colspan="3">របាយការណ៍ស្តុករបស់ទំនិញ</th>
        </tr>
        <tr style="background-color: lightgray">
          <th scope="col">No</th>
          <th scope="col">Product Name</th>
          <th scope="col">In Stock</th>
          <th scope="col">Created At</th>
        </tr>
        <!-- =================================== -->
        <?php

        $no = 1;
        $sum_qty = 0;
        $sum_total_price = 0;


        $report = "SELECT product.*,
                    stock_history.created_at AS history_created_at,
                    stock_history.qty
                    FROM stock_history
                    inner join
                    product
                    on
                    stock_history.product_id=product.id
                    where stock_history.created_at between '$dateFrom' and '$dateTo'

        ";
        $result = mysqli_query($con, $report);

        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row['pro_name']);
        //   if ($row['created_at'] >= $dateFrom and $row['created_at'] <= $dateTo) {
            // $sum_qty += $row['stock'];
            // $total = $row['stock'] * $row['price'];
            // $sum_total_price += $total;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['pro_name']; ?></td>
              <td><?php echo $row['qty']; ?> Pcs</td>
              <td><?php echo $row['history_created_at']; ?></td>

            </tr>
        <?php
            $no++;
        //   } //close filter

        } //close while loop database
        //echo $sum;
        ?>
        <tr>
          <td colspan="5" align="right">Total Quantity From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
          <td style="font-size: 16px;" class="text text-info"><?php echo $sum_qty . " ទំនិញ"; ?></td>
        </tr>
        <tr>
          <td colspan="5" align="right">Total Amount From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
          <td style="font-size: 16px;" class="text text-primary"><?php echo number_format($sum_total_price, 2) . " ដុល្លា"; ?></td>
        </tr>

      <?php
    } // close if isset form post
      ?>
      </table>
      <hr>
</div>
<?php include '../include/footer.php'; ?>

<!-------complete html----------->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>

<script src="../htmlToPdf/html2pdf.js"></script>
<script src="../htmlToPdf/html2pdf.min.js"></script>
<script src="../htmlToPdf/html2pdf.bundle.min.js"></script>
<script>
  $('#pdf').click(function() {
    var element = document.getElementById('print');
    var opt = {
      margin: [15, 10, 10, 10],
      filename: 'Stock report.pdf',
      image: {
        type: 'jpeg',
        quality: 0.98
      },
      html2canvas: {
        dpi: 192,
        scale: 4,
        letterRendering: true,
        useCORS: true,
      },
      jsPDF: {
        unit: 'mm',
        format: 'a4',
        orientation: 'landscape'
      }
    };

    html2pdf(element, opt);

  });
</script>

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
