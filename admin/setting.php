<?php
session_start();
include'../connection.php';
// include'../includes/sidebar.php';

include '../include/navigation.php';
include '../include/header.php';
// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT role, role_id FROM role";
$result = mysqli_query($con, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='role'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['role_id']."'>".$row['role']."</option>";
  }

$opt .= "</select>";

                    $id = $_GET['id'];
        $query = "SELECT *
                      FROM users u
                    --   join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
                    --   join job j on e.JOB_ID=j.JOB_ID
                    --   join location l on e.LOCATION_ID=l.LOCATION_ID
                    --   join type t on u.TYPE_ID=t.TYPE_ID
                      WHERE ID =".$_GET['id'];
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
          while($row = mysqli_fetch_array($result))
          {  
                $id= $row['ID'];
                $user= $row['username'];
                $pass=$row['password'];
                // $c=$row['GENDER'];
                // $d=$row['USERNAME'];
                // $e=$row['PASSWORD'];
                // $f=$row['EMAIL'];
                // $g=$row['PHONE_NUMBER'];
                // $h=$row['JOB_TITLE'];
                // $i=$row['HIRED_DATE'];
                // $j=$row['PROVINCE'];
                // $k=$row['CITY'];
                // $l=$row['TYPE'];
          }
      ?>

        <div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Account Info</h4>
            </div>
            <div class="card-body">
      

            <form role="form" method="post" action="settings_edit.php">
              <input type="hidden" name="id" value="<?php echo $user; ?>" />

              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Username :
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="User Name" name="username" value="<?php echo $user; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Password :
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Password" name="password" value="<?php echo $pass; ?>" required>
                </div>
              </div>
              <!-- <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Gender:
                </div>
                <div class="col-sm-9">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Username:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Username" name="username" value="<?php echo $d; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Password:
                </div>
                <div class="col-sm-9">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email" name="email" value="<?php echo $f; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact #" name="phone" value="<?php echo $g; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Role:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Role" name="role" value="<?php echo $h; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Hired Date:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Hired Date" name="hireddate" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Province:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Province" name="province" value="<?php echo $j; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 City / Municipality:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="City / Municipality" name="city" value="<?php echo $k; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                  Account Type:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Account Type" name="type" value="<?php echo $l; ?>" readonly>
                </div>
              </div> -->
              <hr>

                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div>        

<?php
include'../include/footer.php';
?>

