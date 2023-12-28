<?php
// session_start();
// include("../check-login.php");
include '../connection.php';
if (isset($_POST['category'])) {
  $category = htmlspecialchars($_POST['category']);

  $sql = "INSERT INTO category(c_name) VALUES('$category')";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: insert_pro.php");
  } else {
    echo "Error!";
  }
}
?>