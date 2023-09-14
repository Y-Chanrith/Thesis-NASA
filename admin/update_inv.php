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

$query = 'SELECT ID,PRO_NAME,STOCK,date_in_stock,COMPANY_NAME, c.C_NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID WHERE ID =' . $_GET['id'];
$result = mysqli_query($con, $query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
  $zzz = $row['ID'];
  $zz = $row['PRO_NAME'];
  $B = $row['STOCK'];
  $dis = $row['date_in_stock'];
  $D = $row['COMPANY_NAME'];
  $E = $row['C_NAME'];
}
$id = $_GET['id'];
?>

<center>
<div class="main-content">
  <div class="container m-5">
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
      <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Edit Inventory for : <?php echo $zz ?></h4>
      </div>
      <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='<?php echo $zzz; ?>'"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a>

      <div class="card-body">

        <form role="form" method="post" action="inv_edit1.php">
          <input type="hidden" name="idd" value="<?php echo $zzz; ?>" />
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Product Name:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $zz; ?>" readonly>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Quantity:
            </div>
            <div class="col-sm-9">
              <input class="form-control" placeholder="Quantity" name="qty" value="<?php echo $B; ?>" required>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Date In Stock:
            </div>
            <div class="col-sm-9">
              <input type="date" class="form-control" placeholder="Date" name="dis" value="<?php echo $dis; ?>" required>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Supplier:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $D; ?>" readonly>
            </div>
          </div>
          <div class="form-group row text-left text-warning">
            <div class="col-sm-3" style="padding-top: 5px;">
              Category:
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo $E; ?>" readonly>
            </div>
          </div>
          <hr>

          <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
</center>

<?php
include '../include/footer.php';
?>