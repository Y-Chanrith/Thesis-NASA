<?php
include "../connection.php";
//include "../include/header.php";
  
?> 
<?php
if($_GET['customer_id']){
    $customer_sql="select firstname,lastname,cus_id,phone from customer where cus_id=".$_GET['customer_id'];
    $cus_re = mysqli_query($con, $customer_sql);
    $customer=$cus_re->fetch_assoc();
}
          
 
?>
            
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
                    Date: <?=date('Y-m-d') ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    <?php  ?>
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
            <td><?= $row['qty'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['price'] * $row['qty']?></td>
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
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right"> <?=$subtotal  ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Qty</td>
                      <td class="text-right"><?=$qty ?></td>
                    </tr>
                    
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="text-right"> <?=$subtotal  ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php
include '../include /footer.php';
?>
