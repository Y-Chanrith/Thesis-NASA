<?php
// session_start();
// include("../check-login.php");
include '../connection.php';
// var_dump($_GET);
if (isset($_GET['firstname'])) {
  $firstname = htmlspecialchars($_GET['firstname']);
  $lastname = $_GET['lastname'];
  $phone = $_GET['phone'];
  $address = $_GET['address'];

//   var_dump($result);
  $sql = "INSERT INTO customer(firstname,lastname,phone,`address`) VALUES('$firstname', '$lastname', '$phone', '$address')";
  $result = mysqli_query($con, $sql);
  // $con->
  echo 'Add customer successfully!';

}
?>

