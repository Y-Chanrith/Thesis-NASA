<?php
// session_start();
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
  // include "../include/navigation.php";
  // include "../include/header.php";
  //$product_ids = array();
  $sql = "select * from category";
  $cat = mysqli_query($con, $sql);
  ?>
  <div class="container-fluid pt-4 vh-100">
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-0" style="border-radius: 0px;">
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
      if ($_POST) {
        //var_dump($_POST);
      }
      ?>
      <form action="transaction.php" id="pos_submit"method="POST">
        <div class="card mb-4 col-md-4" style="margin-right:12px; position: absolute; right:0; top:96px;
         padding:0 10px ; border-radius: 0px; ">
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
              <a href="#addCustomerModal" class="btn btn-primary" data-toggle="modal">
                <i class="fas fa-plus"></i>
              </a>
              <!----add-modal start--------->
              <?php //include 'include/add_customer_modal.php'; ?>
              <!----edit-modal end--------->

            </div>

          </div>
          <div class="row">
            <div class="card-body col-md-12">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="">
                    <th width="40%">Item</th>
                    <th width="10%">QTY</th>
                    <th width="20%">Price</th>
                    <th width="20%">Total</th>
                    <th width="10%">Action</th>
                  </thead>
                  <tbody id="table">
                  </tbody>
                </table>
              </div>
            </div>

            <input type="hidden" name="date" value="<?php echo $today; ?>">
            <div class="form-group row mb-0">
              <div class="col-sm-5 text-left text-primary py-2">
                <h6>
                  Subtotal
                </h6>
              </div>
              <div class="col-sm-7">
                <div class="input-group mb-2">
                  <input type="text" class="form-control text-right " id="subtotal" name="subtotal" readonly >
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
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
                  <!-- <div class="input-group-prepend"><span class="input-group-text">Pcs</span></div> -->
                  <input type="text" name='total_qty' class="form-control text-right " id="total_qty" value="" readonly name="item">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Items</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row text-left mb-0">
              <div class="col-sm-5 text-primary">
                <h6 class="font-weight-bold py-2">
                  Discount
                </h6>
              </div>
              <div class="col-sm-7">
                <div class="input-group mb-2">
                  <input type="text" class="form-control text-right " name="discount" id="discount" >
                  <div class="input-group-prepend">
                    <span class="input-group-text">%</span>
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
                  <input type="text" class="form-control text-right " name="grand_total" id="grand_total" readonly name="total">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
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
                  <!-- <div class="input-group-prepend"><span class="input-group-text">$</span></div> -->
                  <select name="payment_method" required class="form-control">
                    <option value="">Select Payment</option>
                    <option value="cash">Cash</option>
                    <option value="bank transfer">Bank Transfer</option>
                    <option value="Credit Card">Credit Card</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <div class=" mb-3 mt-3">
                <a href="pos.php" style="float: left;" class="btn btn-danger btn-md rounded p-2 text-white">RESET PROCESS</a>
                <a href="#submitSale"id="submitsale"  style="float: right;" class="btn btn-primary p-2" data-toggle="modal">SUBMIT PAYMENT</a>
                <!-- <input type="submit" id="submit" style="float: right;"
                class="btn btn-primary btn-md rounded p-2 mr-2 text-white" value="PROCESS CHECK OUT" onclick="alert('Added to Sale')"> -->
              </div>
            </div>
            <?php // endif;
            ?>
            <!-- closr -->
          </div>
        </div>
         <!-- submit modal -->
        <div class="modal fade" tabindex="-1" id="submitSale" role="dialog">
            <div class="modal-dialog" role="document">
            >
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">SUMMARY</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="form-group text-center">
                    <label>GRAND TOTAL</label>
                    <input type="text" class="form-control" id="modal_grand_total" readonly>
                </div><br>
                <div class="form-group">
                    <!-- <label>Last Name</label> -->
                    <input type="text" class="form-control" name="cash" placeholder="ENTER CASH" required>
                </div>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                <button type="submit" id="submit"class="btn btn-primary" onclick="alert('Submited product to Sale')">PROCEED THE PAYMENT</button>
                </div>
            </div>

            </div>
        </div>
        <!-- end submit modal -->
      </form>
    </div>
  </div>

<!-- ===========modal=========== -->

  <?php include "../include/footer_pos.php"; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="plugin/jquery/jquery.js"></script>
  <script src="../js/javascript.js"></script>


  <!-- JavaScript and jQuery code -->
  <script>
    function setCookieObject(cookieName, cookieObject, expirationDays) {
            var jsonString = JSON.stringify(cookieObject);
            var d = new Date();
            d.setTime(d.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
            var expires = 'expires=' + d.toUTCString();
            document.cookie = cookieName + '=' + jsonString + ';' + expires + ';path=/';
        }

        // Function to get the value of a cookie by name and parse it as an object
    function getCookieObject(cookieName) {
        var name = cookieName + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');

        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i].trim();
            if (cookie.indexOf(name) == 0) {
            var jsonString = cookie.substring(name.length, cookie.length);
            return JSON.parse(jsonString);
            }
        }
    return null;
    }

    function deleteCookie(cookieName) {
        document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }

    function deleteAllCookies(cookieNames) {
            cookieNames.forEach(function(cookieName) {
                document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            });

      }

      document.addEventListener("DOMContentLoaded", function() {

        var allCookies = document.cookie;
        var cookieArray = allCookies.split(';');
        var c = cookieArray.filter(element => element.startsWith(' product'));
        const cleanedArray = c.map(element => element.trim());
        const productNames = cleanedArray.map(element => {
        const match = element.match(/^(\w+)=/);
          return match ? match[1] : null;
        });

        deleteAllCookies(productNames);

    });
    $(document).ready(function() {

        //caculate discount
      $('#discount').on('keyup',function(){
            var grand_total=$('#grand_total');
            var sub_total=$('#subtotal');
            var discount=Number($(this).val());
            var discount_amount=Number(sub_total.val())*Number(discount)/100;
            var grand=Number(sub_total.val())-discount_amount;
            grand_total.val(grand.toFixed(2));


      });

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
                  "<p>In Stock: " + datas[i].stock + "</p>" +
                  "<input type='text' name='quantity' class='form-control qty' value='1' />" +
                  "<input type='hidden' name='id' class='form-control id' value='" + datas[i].id + "' />" +
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
      $(document).on('click','.btn_add',  function() {

        var product = $(this).closest('.products');
        let qty = product.find('.qty').val();
        let price = product.find('.price').val();
        let name = product.find('.p_name').val();
        let id = product.find('.id').val();

        $.ajax({
          url: 'check_stock.php',
          type: 'GET',
          data: {
            id: id,
            qty: qty
          },
          success: function(result) {

            // console.log(productNames);
              var result=JSON.parse(result);
            //   console.log(result);
            if (result.status == 'success') {
                if(getCookieObject('product'+id) == undefined){
                    setCookieObject('product'+id,result,7)

                    let table = $('#table');
                    let row = "<tr id='"+id+"'><td><input type='hidden' name='id[]'value='" + id + "'>" + name + "</td><td><span>"+ qty +"</span><input id='product"+id+"'"+"type='hidden' class='qty'name='qty[]'value='" + qty + "'>"+
                        "</td><td><input type='hidden'id='price"+id+"'"+" name='price[]'value='" + price + "'><span>" + price + "</span></td><td><input class='total_price'id='total_price"+id+"'type='hidden' name='total_price[]'value='" + (qty * price).toFixed(2) +
                        "'><span>" + (qty * price).toFixed(2) + "</span></td><td style='float:right;'><a href='#delete'><i class='fas fa-trash delete' id='"+id+"'style='color: #f00000';></'i></a></td>";
                    table.append(row);
                    //  console.log( $('#table').find('tr').find('.total_price'));
                    let tr = $('#table').find('tr').find('.total_price');
                    let qty_element = $('#table').find('tr').find('.qty');
                    let total_qty = 0;
                    qty_element.each(function(index, element) {
                        total_qty += Number($(element).val());
                    });
                    let total = 0;
                    tr.each(function(index, element) {
                        total += Number($(element).val());
                    });
                    $('#subtotal').val(total.toFixed(2));
                    $('#total_qty').val(total_qty);
                    $('#grand_total').val(total.toFixed(2));

                }else{
                    var product=getCookieObject('product'+id);
                    var product_add_qty=$('#product'+product.id).val();
                    if(Number(product_add_qty)+Number(qty) <= Number(product.stock)){
                        $('#product'+product.id).val(Number(product_add_qty)+Number(qty));
                        $('#product'+product.id).closest('td').find('span').text(Number(product_add_qty)+Number(qty));
                        $('#total_price'+product.id).closest('td').find('input').val(((Number(product_add_qty)+Number(qty))*price).toFixed(2));
                        $('#total_price'+product.id).closest('td').find('span').text("$"+((Number(product_add_qty)+Number(qty))*price).toFixed(2));

                        let tr = $('#table').find('tr').find('.total_price');
                        let qty_element = $('#table').find('tr').find('.qty');
                        let total_qty = 0;
                        qty_element.each(function(index, element) {
                            total_qty += Number($(element).val());
                        });
                        let total = 0;
                        tr.each(function(index, element) {
                            total += Number($(element).val());
                        });
                        console.log(total);
                        $('#subtotal').val(total.toFixed(2));
                        $('#total_qty').val(total_qty);
                        $('#grand_total').val(total.toFixed(2));
                    }else{
                        alert('Product out of stock!');
                    }
                }

            } else {
              alert(result.message);
            }
          }
        });
      });

      $('#table').on('click','.delete', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        let tr = $('#table').find('tr').find('.total_price');
        let qty_element = $('#table').find('tr').find('.qty');
        let total_qty = 0;
        qty_element.each(function(index, element) {
          total_qty += Number($(element).val());
        });
        let total = 0;
        tr.each(function(index, element) {
          total += Number($(element).val());
        });
        //console.log(total);
        $('#subtotal').val(total.toFixed(2));
        $('#total_qty').val(total_qty);
        $('#grand_total').val(total.toFixed(2));
        var id=$(this).attr('id');
        deleteCookie('product'+id);
        // console.log(getCookieObject('product'+id));


      });

      $('#submitsale').on('click',function(){
        $('#modal_grand_total').val( $('#grand_total').val());
      });

      $('#submit').on('click',function(e){
        // e.preventDefault();
            let tr = $('#table').find('tr');
            var id=[];
            tr.each(function(index, element) {
                id.push('product'+$(element).attr('id'));
            });

            deleteAllCookies(id);

            $('#pos_submit').trigger('submit');

      });

    });
  </script>

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
