<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM product join category on product.category_id=category.category_id GROUP BY id';
$result = mysqli_query($con, $sql);


include '../include/navigation.php';

include '../include/header.php';
?>


<!------main-content-start----------->

<div class="main-content">
  <div class="row">
    <div class="col-md-12">
      <!-- dropdown -->

      <div class="table-title" style="background-color: white; border:none;outline: none;">
        <div class="row">
          <div class="col-sm-6 pt-0 flex justify-content-lg-start justify-content-center">
            <h3 class="" style="color: black;">Report </h3>
          </div>

        </div>
      </div>
      <div>
      </div>


      <!-- end drop down -->


      <div class="table-wrapper">
        <div class="table-title" style="background-color: #E4E4E4;">
          <div class="row">
            <div class="col-sm-6 pt-2 flex justify-content-lg-start justify-content-center">
              <label class="" style="color: black;">From date : </label>
              <span class="input-calender ">
                <input type="date" class="pr-1 pl-2" placeholder="" name="from" placeholder="Search Articles" aria-label="Search" aria-describedby="button-addon2" style="opacity: 90%;">
              </span>
              <label class=" pl-3" style="color: black;"> to : </label>
              <span class="input-calender">
                <input type="date" placeholder="" class="pr-1 pl-2" name="to" placeholder="Search Articles" aria-label="Search" aria-describedby="button-addon2" style="opacity: 90%;">
              </span>
            </div>
            <div class="col-sm-6 pt-2 flex justify-content-lg-end justify-content-center">
              <button class="btn btn-secondary rounded"><span>Download</span></button>
              <input type="submit" value="Show Report" class="btn btn-danger rounded">
            </div>
          </div>
        </div>
       
        <table class="table table-striped table-hover mt-2 ">
          <thead>
            <tr style="background-color: #DAF5FF">
              <th scope="col">No</th>
              <th scope="col">Product Name</th>
              <th scope="col">Brand</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Total Price</th>
              <th scope="col">Stock</th>
              <th scope="col">Date Post</th>
            </tr>
          </thead>

          <?php if (isset($_POST['from'])) {
            $dateFrom = $_POST['from'];
            $dateTo = $_POST['to'];
          ?>
            <!-- ========Print report================= -->
            <!-- <div class="input-group mb-3">
                <form method="post" action="print-report.php" class="form-control" style="border:none;">
                    <input type="hidden" name="from" value="<?php //echo $dateFrom; 
                                                            ?>">
                    <input type="hidden" name="to" value="<?php //echo $dateTo; 
                                                          ?>">
                    <div class="input-group-append">
                        <input type="submit" value="Print Report" class="btn btn-outline-primary">
                    </div>
                </form>
            </div> -->
            <!-- =================================== -->
            <?php

            $no = 1;
            $sum_qty = 0;
            $sum_total_price = 0;


            $report = "SELECT * FROM product join category on product.category_id=category.category_id GROUP BY id";
            $result = mysqli_query($con, $report);

            while ($row = mysqli_fetch_assoc($result)) {


              if ($row['date_in_stock'] >= $dateFrom and $row['date_in_stock'] <= $dateTo) {
                $sum_qty += $row['stock'];
                $sum_total_price += $row['total_price'];
            ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['pro_name']; ?></td>
                  <td><?php echo $row['brand']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td><?php echo $row['price']; ?> ដុល្លា</td>
                  <td><?php echo $row['total_price']; ?> ដុល្លា</td>
                  <td><?php echo $row['stock']; ?></td>
                  <td><?php echo $row['date_in_stock']; ?></td>
                </tr>

            <?php
                $no++;
              } //close filter

            } //close while loop database
            //echo $sum;
            ?>
            <tr>
              <td colspan="5" align="right">Total Quantity From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
              <td><?php echo $sum_qty . " កែវ"; ?></td>
            </tr>
            <tr>
              <td colspan="5" align="right">Total Amount From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
              <td><?php echo $sum_total_price . " ដុល្លា"; ?></td>
            </tr>

          <?php
          } // close if isset form post
          ?>

        </table>

      </div>
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