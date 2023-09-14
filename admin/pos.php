<?php
//include '../check-login.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">
  <script src="../sweetalert-2.1.2/package/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <title>Point of Sale</title>
</head>

<body style="background-color: #F6F6F6;">
  <?php include "../include/header_pos.php";
  //$product_ids = array();
  $sql = "select * from category";
  $cat = mysqli_query($con, $sql);
  ?>
  <div class="container-fluid pt-4">
    <div class="row">
      <div class="col-lg-8">
        <div class="card mb-0">
          <div class="card-header py-2">
            <h4 class="m-1 text-lg text-primary">Product category</h4>
          </div>

          <!-- /.panel-heading -->
          <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <?php
              while ($row = mysqli_fetch_assoc($cat)) {
              ?>
                <li class="nav-item">
                  <a class="nav-link cat_id" data-cat="<?= $row['category_id'] ?> " href="<?php echo '?cat=' . $row['category_id'] ?>" data-target="#keyboard" data-toggle="tab"><?php echo $row['c_name'] ?></a>
                </li>
              <?php } ?>
            </ul>
            <div class="tab-content">
              <div class="">
                <!-- <h1>Seyma</h1>   -->
                <div class="row" id="product-container">
                <!-- <div class='col-sm-4 col-md-2 border border-primary rounded shadow p-3 m-3'>" +
                      <div class='products'> +
                        <center> +
                            <h6 class='text-info'> + datas[i].pro_name + </h6> +
                            <img src='../image/ + datas[i].image + 'style='width: 50%; '> +
                        </center> +
                        <h6>Price: $  + datas[i].price + </h6> +
                        <input type='text' name='quantity' class='form-control qty' value='1' /> +
                        <input type='hidden' name='name' class='p_name' value=' + datas[i].pro_name + "' /> +
                        <input type='hidden' name='price' class='price' value=' + datas[i].price + ' /> +
                        <input type='submit' name='addpos' style='margin-top:5px;float: right;' class='btn btn-primary btn_add' value='Add' /> +
                      </div> +
                  </div> -->

                </div>

              </div>
            </div>
            <div>
            </div>
          </div>
        </div>
      </div>
      <?php 
        if($_POST){
          //var_dump($_POST);
        }
      ?>
      <form action="transaction.php" method="POST">
      <div class="card mb-4 col-md-4" style="margin-right:12px; position: absolute; right:0; top:95px;
         padding:0 10px ; ">
        <?php
        //DROPDOWN FOR CUSTOMER
        $sql = "SELECT cus_id, firstname, lastname FROM customer order by firstname asc";
        $res = mysqli_query($con, $sql) or die("Error SQL: $sql");

        $opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' required>
        <option value='' disabled selected hidden>Select Customer</option>";
        while ($row = mysqli_fetch_assoc($res)) {
          $opt .= "<option value='" . $row['cus_id'] . "'>" . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
        }
        $opt .= "</select>";
        // END OF DROP DOWN
        ?>

        <div class="card-header py-2 mb-2" style="background-color: white;">
          <h5 class="m-1 text-primary">Point of Sale</h5>
        </div>
        <?php
          echo "Today's date is : ";
          date_default_timezone_set("Asia/Bangkok");
          $today = date("Y-m-d H:i a");
          echo $today;
        ?>
        <div class="form-group row text-left mb-3 mt-2">
          <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
          </div>

        </div>
        <div class="row">
          <div class="card-body col-md-9">
            <div class="table-responsive">

              <!-- trial form lang   -->
                <!-- <input type="hidden" name="employee" value="<?php //echo $_SESSION['FIRST_NAME']; ?>">
                <input type="hidden" name="role" value="<?php //echo $_SESSION['JOB_TITLE']; ?>"> -->

                <table class="table table-hover" >
                  <tbody id="table">
                    <thead class="">
                      <th width="40%">Product Name</th>
                      <th width="10%">Quantity</th>
                      <th width="20%">Price</th>
                      <th width="20%">Total</th>
                      <th width="10%">Action</th>
                    </thead>

                  </tbody>

                  <!-- <tr>
                    <td>RGB Keyboard</td>
                    <td>2</td>
                    <td>$ 18</td>
                    <td>$ 27</td>
                    <td><a href="#delete"><i class="fas fa-trash" style="color: #f00000;"></i></a></td>
                  </tr> -->
                </table>

            </div>
          </div>

          <!-- test -->
          <input type="hidden" name="date" value="<?php echo $today; ?>">

          <div class="form-group row mb-0">
            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Subtotal
              </h6>
            </div>
            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control text-right " id="subtotal" name="subtotal" readonly name="subtotal">
              </div>
            </div>

          </div>
          <div class="form-group row mb-0">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Quantity
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-0">
                <!-- <div class="input-group-prepend">
                  <span class="input-group-text">Pcs</span>
                </div> -->
                <input type="text" name='total_qty'class="form-control text-right "id="total_qty" value="" readonly name="lessvat">
                <div class="input-group-prepend">
                  <span class="input-group-text">Items</span>
                </div>
              </div>
            </div>

          </div>
          
          <div class="form-group row text-left mb-0">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Grand Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control text-right " name="grand_total" id="grand_total" readonly name="total">
              </div>
            </div>
          </div>

          <div class="form-group row mb-0">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
               Payment Method
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-0">
                <!-- <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div> -->
                <select name="payment_method" required class="form-control">
                <option value="">Select Payment</option>
                  <option value="cash">Cash</option>
                  <option value="bank transfer">Bank Transfer</option>
                </select>
              </div>
            </div>

          </div>

          <div class="form-group row text-left mb-2">
            <div class="col-sm-5 text-primary">
              <input type="submit" class="btn bg-danger rounded border-0 p-2 text-white" value="submit" onclick="alert('Added to Sale')">
            </div>
          </div>
          <?php // endif; 
          ?>
          <!-- closr -->

        </div>
      </div>
      </form>
    </div>
  </div>
  <script src="plugin/jquery/jquery.js"></script>
  <script src="../js/javascript.js"></script>
  <script>
    // alert('hello');
    $(document).ready(function() {
      // $('.btn_add').on('click', function() {
      //   // alert("hello");
      //   var product = $(this).closest('.products');
      //   let qty = product.find('.qty').val();
      //   let price = product.find('.price').val();
      //   let name = product.find('.p_name').val();
      //   let table = $('#table');
      //   let row = "<tr ><td>" + name + "</td><td>" + qty + "</td><td>" + price + "</td><td>" + qty * price + "</td><td><span class='delete'><i class='fas fa-trash' style='color: #f00000';></'i></span></td>";
      //   table.append(row);
      //   console.log(qty);
      // });

      
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.cat_id').click(function(e) {
        e.preventDefault();
        let cat_id = $(this).attr('data-cat');
        // alert(cat_id);
        $.ajax({
          url: 'get_product.php?id=' + cat_id,
          type: 'GET',
          success: function(data) {

            if (jQuery.parseJSON(data).length > 0) {
              let element = "";
              let datas = jQuery.parseJSON(data);
              // console.log(jQuery.parseJSON(data));

              $('#product-container').html('');
              for (let i = 0; i < jQuery.parseJSON(data).length; i++) {
                $('#product-container').append(

                  "<div class='col-sm-4 col-md-2 border border-primary rounded shadow p-3 m-3'>" +
                      "<div class='products'>" +
                        "<center>" +
                            "<h6 class='text-info'>" + datas[i].pro_name + "</h6>" +
                            "<img src='../image/" + datas[i].image + "'style='width: 50%; '>" +
                        "</center>" +
                        "<h6>Price: $ " + datas[i].price + "</h6>" +
                        "<input type='text' name='quantity' class='form-control qty' value='1' />" +
                        "<input type='hidden' name='id' class='form-control id' value='"+datas[i].id+"' />" +
                        "<input type='hidden' name='name' class='p_name' value='" + datas[i].pro_name + "' />" +
                        "<input type='hidden' name='price' class='price' value='" + datas[i].price + "' />" +
                        "<input type='submit' name='addpos' style='margin-top:5px;float: right;' class='btn btn-primary btn_add' value='Add' />" +
                      "</div>" +
                  "</div>");
              }
            }
            
          }
        });
      });
      $('#product-container').delegate('.btn_add','click', function() {
        // alert("hello");
            var product = $(this).closest('.products');
            let qty = product.find('.qty').val();
            let price = product.find('.price').val();
            let name = product.find('.p_name').val();
            let id=product.find('.id').val();
            let table = $('#table');
            let row = "<tr><td><input type='hidden' name='id[]'value='"+id+"'>" + name + "</td><td><input type='hidden' class='qty'name='qty[]'value='"+qty+"'>" + qty + 
            "</td><td><input type='hidden' name='price[]'value='"+price+"'>$ " + price + "</td><td><input class='total_price'type='hidden' name='total_price[]'value='"+(qty*price).toFixed(2)
            +"'>$ " + (qty * price).toFixed(2) + "</td><td><a href='#delete'><i class='fas fa-trash delete' style='color: #f00000';></'i></a></td>";
            table.append(row);
          //  console.log( $('#table').find('tr').find('.total_price'));
          let tr=$('#table').find('tr').find('.total_price');
          let qty_element=$('#table').find('tr').find('.qty');
          let total_qty=0;
          qty_element.each(function (index,element){
            total_qty+=Number($(element).val());
          });
          let total=0;
          tr.each(function (index,element){
            total+=Number($(element).val());
          });
          //console.log(total);
          $('#subtotal').val(total.toFixed(2));
          $('#total_qty').val(total_qty);
          $('#grand_total').val(total.toFixed(2));
      });  
      $('#table').delegate('.delete','click',function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
            let tr=$('#table').find('tr').find('.total_price');
          let qty_element=$('#table').find('tr').find('.qty');
          let total_qty=0;
          qty_element.each(function (index,element){
            total_qty+=Number($(element).val());
          });
          let total=0;
          tr.each(function (index,element){
            total+=Number($(element).val());
          });
          //console.log(total);
          $('#subtotal').val(total.toFixed(2));
          $('#total_qty').val(total_qty);
          $('#grand_total').val(total.toFixed(2));
      }); 
    });
  </script>

</body>
</html>