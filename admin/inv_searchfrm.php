<?php
session_start();
include("../check-login.php");
include '../connection.php';

$query2 = 'SELECT PRO_NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID where id =' . $_GET['id'] . ' limit 1';
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));

include '../include/navigation.php';
include '../include/header.php';
?>
<div class="main-content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Inventory for : <?php while ($row = mysqli_fetch_assoc($result2)) {
                                                                        echo $row['PRO_NAME'];
                                                                      } ?>
            <span><a href="inventory.php" class="btn btn-primary" style="float: right;">
            <i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a></span>
        </h4>

        
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ProID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Date Stock In</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $query = 'SELECT ID, image, PRO_NAME, STOCK, c.C_NAME, s.COMPANY_NAME, p.created_at FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID where id =' . $_GET['id'];
              $result = mysqli_query($con, $query) or die(mysqli_error($con));
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['PRO_NAME'] . '</td>';
                echo '<td>' . $row['STOCK'] . '</td>';
                echo '<td>' . $row['C_NAME'] . '</td>';
                echo '<td>' . $row['COMPANY_NAME'] . '</td>';
                echo '<td>' . $row['created_at'] . '</td>';
                echo '<td align="right">
                      <a type="button" class="btn btn-sm btn-warning bg-gradient-warning" href="update_inv.php?action=edit & id='.$row['ID']. '"><i class="fas fa-fw fa-edit"></i> Edit</a>
                          </div></td>';
                echo '</tr> ';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>