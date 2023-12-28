<?php
ob_start();
session_start();
include("../check-login.php");
include("../connection.php");

$sql = "SELECT DISTINCT C_NAME, CATEGORY_ID FROM category order by C_NAME asc";
$result = mysqli_query($con, $sql) or die("Bad SQL: $sql");

$opt = "<select class='form-control' name='category' required>
        <option value='' disabled selected hidden>Select Category</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $opt .= "<option value='" . $row['CATEGORY_ID'] . "'>" . $row['C_NAME'] . "</option>";
}

$opt .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($con, $sql2) or die("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier'>
        <option disabled selected>Select Supplier</option>";
while ($row = mysqli_fetch_assoc($result2)) {
  $sup .= "<option value='" . $row['SUPPLIER_ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
}

$sup .= "</select>";



include '../include/navigation.php';
include '../include/header.php';

$query = 'SELECT ID,PRO_NAME,STOCK,p.created_at,COMPANY_NAME, c.C_NAME FROM product p 
join category c on p.CATEGORY_ID=c.CATEGORY_ID 
JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID WHERE ID =' . $_GET['id'];
$result = mysqli_query($con, $query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
  $id = $row['ID'];
  $pro_name = $row['PRO_NAME'];
  $qty = $row['STOCK'];
  $date = $row['created_at'];
  $sup_name = $row['COMPANY_NAME'];
  $c_name = $row['C_NAME'];
}
$id = $_GET['id'];
?>

<center>
<div class="main-content">
  <div class="container m-5">
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
      <div class="card-header py-3 bg-white">
        <h4 class="m-2 font-weight-bold text-primary">Edit Inventory for : <?php echo $pro_name ?></h4>
      </div>
      <!-- <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='<?php echo $id; ?>'"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a> -->

      <div class="card-body">

        <form role="form" method="post" action="inv_edit1.php">
          <input type="hidden" name="idd" value="<?php echo $id; ?>" />
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Product Name:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $pro_name; ?>" readonly>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Quantity:
            </div>
            <div class="col-sm-9">
              <input class="form-control" placeholder="Quantity" name="qty" value="<?php echo $qty; ?>" required>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Date In Stock:
            </div>
            <div class="col-sm-9">
              <input type="date" class="form-control" placeholder="Date" name="date" value="<?php echo $date; ?>" required>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Supplier:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $sup_name; ?>" readonly>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Category:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $c_name; ?>" readonly>
            </div>
          </div>
          <hr>
          <div style="float: right;">
          <button class="btn btn-primary">
                <a type="button" 
                href="inv_searchfrm.php?action=edit & id='<?php echo $id; ?>'">
                <i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back
                </a>
          </button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i>Update</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
</center>

<?php
include '../include/footer.php';
?>