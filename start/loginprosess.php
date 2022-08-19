<?php
error_reporting(0);
?>


<?php

session_start();
include '../config/dbcon.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $email_search = "SELECT * FROM tbl_registration WHERE email='$email' AND password='$password'";

  $query = mysqli_query($con, $email_search);
  $result1 = mysqli_fetch_assoc($query);
  $emp_id = $result1['emp_id'];
  $firstname = $result1['firstname'];
  $image = $result1['image'];
  $pwd = $result1['password'];
  $role = $result1['role'];

  if ($emp_id == $emp_id && $pwd == $password) {

    $_SESSION['firstname'] = $firstname;
    $_SESSION['image'] = $image;
    $_SESSION['emp_id'] = $emp_id;
    $_SESSION['role'] = $role;


    if ($role === "ADMIN") {

      echo '<script type="text/javascript">';
      // echo 'alert("Login Sucess Fully");';
      echo 'window.location = "dashboard.php";';
      echo '</script>';
    } else if ($role === "DEVELOPER") {
      echo '<script type="text/javascript">';
      // echo 'alert("Login Sucess Fully");';
      echo 'window.location = "dashboard.php";';
      echo '</script>';
      // echo 'Login';
    }
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Incorrect credentials, please try again!");';
    //header("location:../index.php");
     echo 'window.location ="../index.php";';
   //hader("location:..index.php");
    echo '</script>';
    //header("location:../index.php");
    //echo ' not Login';

  }
}
?>