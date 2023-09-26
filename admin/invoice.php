<?php
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>Sale Invoice</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      background: #eee;
      margin-top: 20px;
    }
    a {
            text-decoration: none;
            color: white;
        }

        @media print {
            #print {
                display: none;
            }
            #back{
                display: none;
            }
        }

    .text-danger strong {
      color: #9f181c;
    }

    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      /* font-family: open sans; */
    }

    .receipt-main p {
      color: #333333;
      /* font-family: open sans; */
      line-height: 1.42857;
    }

    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }

    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }

    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }

    .receipt-main thead th {
      color: #fff;
    }

    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }

    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }

    .receipt-right p i {
      text-align: center;
      width: 18px;
    }

    .receipt-main td {
      padding: 9px 20px !important;
    }

    .receipt-main th {
      padding: 13px 20px !important;
    }

    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }

    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    }

    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }

    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }

    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }

    #container {
      background-color: #dcdcdc;
    }
  </style>
</head>

<body>
  <?php
  $sql_query = "SELECT * FROM customer 
  join transaction on customer.cus_id=transaction.cust_id
  where cus_id=" . $_GET['customer_id'];
  $result = mysqli_query($con, $sql_query);
  $rows = mysqli_fetch_assoc($result);
  ?>

  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6" style="float: right;">
        <a href="#" onclick="reprint()" id="print" class="btn btn-primary btn-sm float-right ml-2"> Print</a>
        <a href="sale.php" id="back" class="btn btn-danger btn-sm float-right"> Back</a>
      </div>
      <div class="col-md-6">
        
      </div>
    </div>
    <div class="row">
      <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <div class="row">
          <div class="receipt-header">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="receipt-left">
                <img class="img-responsive" src="../image/NASA-Computer.png" alt="code logo" width="100px">
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
              <div class="receipt-right">
                <h5><span style="color:red;">NASA</span> <span style="color:blue;">COMPUTER</span></h5>
                <h5><span style="color:red;">ណាស្សា</span> <span style="color:blue;">កុំព្យូទ័រ</span></h5>
                <h6>Tel: +855 89 353 560 <i class="fa fa-phone"></i></h6>
                <h6>Email: nasacomputer168@gmail.com</h6>
                <p>Siem Reap, Cambodia <i class="fa fa-location-arrow"></i></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="receipt-header receipt-header-mid">
            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
              <div class="receipt-right">
                <h5>Bill to: <?= $rows['firstname'] ?> <?= $rows['lastname'] ?> </h5>
                <p><b>Mobile : </b><?= $rows['phone'] ?></p>
                <p><b>Address : </b><?= $rows['address'] ?></p>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="receipt-left">
                <h4>INVOICE #<?= $rows['id'] ?></h4>
                <h5>Date: <?= $rows['created_at'] ?></h5>
              </div>
            </div>
          </div>
        </div>
        <div>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th width=40%>Description</th>
                <th width=20%>Price</th>
                <th width=10%>Quantity</th>
                <th width=30%>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_qty = 0;
              $total_amount = 0;
              $sql = "select * from transaction_detail
                        inner join product on transaction_detail.product_id=product.id
                        where transac_id =" . $_GET['id'];
              $result = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($result)) :
                $total_qty += $row['qty'];
                $total_amount += ($row['qty'] * $row['price']);
              ?>
                <tr>
                  <td class="col-md-9"><?= $row['pro_name'] ?></td>
                  <td class="col-md-3">$ <?= number_format($row['price'], 2) ?></td>
                  <td class="col-md-3"><?= $row['qty'] ?></td>
                  <td class="col-md-3">$ <?= number_format($row['qty'] * $row['price'], 2) ?></td>
                </tr>
              <?php endwhile; ?>
              <tr>
                <td class="text-right" colspan="3">
                  <p>
                    <strong>Sub Total: </strong>
                  </p>
                  <p>
                    <strong>Total Quantity: </strong>
                  </p>
                </td>
                <td>
                  <p>
                    <strong>$ <?= number_format($total_amount, 2); ?></strong>
                  </p>
                  <p>
                    <strong><?= $total_qty; ?> Item</strong>
                  </p>
                </td>
              </tr>
              <tr>
                <td class="text-right" colspan="3" width=30%>
                  <h4><strong>Grand Total: </strong></h4>
                </td>
                <td class="text-left text-danger">
                  <h4><strong>$<?= number_format($total_amount, 2); ?></strong></h4>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="row">
          <div class="receipt-header receipt-header-mid receipt-footer">
            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
              <div class="receipt-right">
                <p><b>Date :</b> <?= date('d-m-Y'); ?></p>
                <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="receipt-left">
                <h1>Stamp</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
  <script>
        function reprint() {
            window.print();
        }
    </script>
</body>

</html>