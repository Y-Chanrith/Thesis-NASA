<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./fontawesome/css/fontawesome.min.css">
  <script src="sweetalert-2.1.2/package/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>NASA Computer Login Page</title>
</head>
<style>
  body {
    background-image: url("image/bg.jpg");
    background-size: cover;
  }
  .logo{
    width: 150px;
    margin-left: 30px;
  }
</style>

<body>

  <div class="container">
    <div class="row align-items-center">
      <div class="col">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
          <form method="post" action="" class="p-5 bg-white rounded">
            <div class="mb-2">
              <!-- <h4 class=" d-flex align-items-center justify-content-center text-black">NASA | LOGIN</h4> -->
              <h3><img src="image/NASA-Computer.png" class="logo" /></h3>
              <?php if (isset($_GET['error'])){ ?>
                <p class ="error"><?php echo $_GET['error']; ?> </p>
              <?php }?>
              <label for="exampleInputEmail1" class="form-label text-black">Username</label>
              <input type="text" class="form-control" name="user" placeholder="Input Username">
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label text-black">Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Input Password">
            </div>
            <div class="mb-2 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label text-black" for="exampleCheck1">Remember Me</label>
            </div>
            <div class="mt-2">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Login</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
session_start();
include("connection.php");
if (isset($_POST['user']) && isset($_POST['pass'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = validate($_POST['user']);
  $password = validate($_POST['pass']);

  $select = "SELECT * FROM tbl_user WHERE username='$username'";
  $result = mysqli_query($con, $select);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($username == $row['username'] && $password == $row['password']) {
        $_SESSION['username'] = $username;
?>
        <!-- Sweetalert framework -->
        <script>
          swal({
            title: "Login Successful",
            icon: "success",
            text: "Welcome to NASA Computer",
            buttons: false,
          });
        </script>
        <!-- =========== -->
      <?php
        header("refresh:2,url=weblab/dashboard.php");
      } 
      else if (empty($username)) {
        header("Location: index.php?error=Username is required");
        exit();
      } 
      else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
      }
      else if(empty($username) && empty($password)){
        echo "Valid input";
        exit();

      }
      else { ?>
        <!-- Sweetalert framework -->
        <script>
          swal("Incorrect Password!", "Please try again", {
            icon: "error",
            buttons: "Try Again",
          });
        </script>
        <!-- =========== -->
<?php 
      }
    }
  }
}
?>