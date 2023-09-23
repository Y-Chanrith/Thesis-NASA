<?php
// session_start();
// include("../check-login.php");
include '../connection.php';
var_dump($_GET);
if (isset($_POST['firstname'])) {
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = $_POST['lastname'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $sql = "INSERT INTO customer(firstname,lastname,phone,address) VALUES('$firstname', '$lastname', '$phone', '$address')";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: pos.php");
  } else {
    echo "Error!";
  }
}
?>
  <!-- <div class="modal fade" tabindex="-1" id="addCustomerModal" role="dialog">
    <div class="modal-dialog" role="document">
    <form method="post" action="" class="myform" class="form-group">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Customer</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="firstname" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lastname" required>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" required>
          </div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
          <button type="submit" class="btn btn-primary">Add Customer</button>
        </div>
      </div>
      </form>
    </div>
  </div> -->
