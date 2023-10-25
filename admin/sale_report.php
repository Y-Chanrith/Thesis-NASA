<?php
session_start();
include("../check-login.php");
include '../connection.php';

include '../include/navigation.php';
include '../include/header.php';
?>
<!------main-content-start----------->

<div class="container mt-5">
  <!-- ============ old form =============== -->
  <!-- =========== end old form ============ -->
  <div class="row">
    <div class="col-sm-12 mb-3">
      <h2 class="ml-lg-2">SALE REPORT</h2>
    </div>
  </div>
    <div class="col-sm-12 p-3" style="background-color: #E3E3E3;">
    <form action="" method="POST">
        <div class="row">
          <div class="col-sm-2" style="float: right;">
            From Date:
          </div>
          <div class="col-sm-3 pl-0">
            <input type="date" required name="from_date" class="form-control">
          </div>
          <div class="col-sm-2">
            To Date:
          </div>
          <div class="col-sm-3 pl-0">
            <input type="date" required name="to_date" class="form-control">
          </div>
          <div class="col-md-2 ">
            <input type="submit" class="btn btn-primary float-right ml-2" value="Filter">
            <a href="sale_report.php" class="btn btn-success float-right">Reset</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div style="margin: 0px 70px; ">
    <hr>
  <table class="table table-bordered">
                   <!--  <tr style="background-color: #DAF5FF">
                        <th scope="col">No</th>
                        <th scope="col">ឈ្មោះមុខទំនិញ</th>
                        <th scope="col">ចំនួនទំនិញ</th>
                        <th scope="col">តម្លៃក្នុងមួយឯកតា</th>
                        <th scope="col">តម្លៃសរុប</th>
                        <th scope="col">ថ្ងៃលក់ទំនិញ</th>
                    </tr> -->

  <?php if (isset($_POST['from_date'])) {
    $dateFrom = $_POST['from_date'];
    $dateTo = $_POST['to_date'];
  ?>
    <!-- ========Print report================= -->
    <div class="input-group mb-3">
      <form method="post" action="print_sale_report.php" class="form-control" style="border:none;">
        <div class="input-group-append" style="float: right;">
          <!-- <input type="submit" value="Print Report" class="btn btn-outline-primary rounded"> -->
          <button type="submit" class="btn btn-secondary rounded"><i class="fas fa-print"></i> Print</button>
          <div  class="btn btn-primary rounded ml-2" id="pdf"><i class="fas fa-file-pdf"></i> PDF</div>
          <input type="hidden" name="from_date"value="<?=$dateFrom ?>">
          <input type="hidden" name="to_date"value="<?=$dateTo ?>">
        </div>
      </form>
    </div>
    <table class="table table-striped" id="print">
        <tr style="background-color: #FFFFFF; font-family: Khmer OS Siemreap;" >
          <th colspan="3">
          ទិន្នន័យចាប់ពី: <?php echo $dateFrom; ?> ដល់: <?php echo $dateTo; ?>
          </th>
          <th colspan="3">របាយការណ៍ការលក់ផលិតផល</th>
        </tr>
      <tr style="background-color: #CEE2FF; font-family: Khmer OS Siemreap;">
        <th scope="col">No</th>
        <th scope="col">ឈ្មោះមុខទំនិញ</th>
        <th scope="col">ចំនួនទំនិញ</th>
        <th scope="col">តម្លៃក្នុងមួយឯកតា</th>
        <th scope="col">តម្លៃសរុប</th>
        <th scope="col">ថ្ងៃលក់ទំនិញ</th>
      </tr>
      <!-- =================================== -->
      <?php

      $no = 1;
      $sum_qty = 0;
      $sum_total_price = 0;

      $report = "SELECT * FROM transaction_detail 
                        join product on transaction_detail.product_id=product.id
                        join transaction on transaction_detail.transac_id=transaction.id";
      $result = mysqli_query($con, $report);

      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['created_at'] >= $dateFrom and $row['created_at'] <= $dateTo) {
          $sum_qty += $row['qty'];
          $grandTotal = ($row['qty'] * $row['price']);
          $sum_total_price += $grandTotal;
      ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['pro_name']; ?></td>
            <td><?php echo $row['qty']; ?> Pcs</td>
            <td><?php echo number_format($row['price'], 2); ?> ដុល្លា</td>
            <td width=20%><?php echo number_format($grandTotal, 2); ?> ដុល្លា</td>
            <td width=15% style="font-size: 15px;"><?php echo $row['created_at']; ?></td>
          </tr>

      <?php
          $no++;
        } //close filter

      } //close while loop database
      //echo $sum;
      ?>
      <tr>
        <td colspan="5" align="right">Total Quantity</td>
        <td style="font-size: 16px; font-family: Khmer OS Siemreap;" class="text text-info"><?php echo $sum_qty . " ទំនិញ"; ?></td>
      </tr>
      <tr>
        <td colspan="5" align="right">Total Amount</td>
        <td style="font-size: 16px; font-family: Khmer OS Siemreap;" class="text text-primary"><?= number_format($sum_total_price, 2) . " ដុល្លា"; ?></td>
      </tr>
    <?php
  } // close if isset form post
    ?>
    </table>
    <hr>
    </div>
    <?php include '../include/footer.php'; ?>
</div>
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
	$('#pdf').click(function(){
		var element = document.getElementById('print');
    var opt = {
      margin:       [15, 10, 10, 10],
      filename:     'sale report.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { 
        dpi: 192,
        scale: 4,
        letterRendering: true,
        useCORS: true,
      },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
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