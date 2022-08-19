<?php
//session_start();
session_start();
if (isset($_SESSION['emp_id'])) {
} else {
   
    header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
include '../config/dbcon.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>  MicroTechnologies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    body {
      font-family: "Lato", sans-serif;
    }


    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: rgb(5, 3, 3);
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: black;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body>


  
  <?php include '../common/sidenav.php'?>


  <nav class="navbar navbar-expand-sm bg-light navbar-light shadow rounded  bg-light">
  <ul class="navbar-nav">
    <li class="nav-item active" class="breadcrumb-item" >
      <a class="nav-link"  href="#"></a>
    </li>
    <li class="nav-item">

    </li>
    <li class="nav-item my-4" style="margin-left:50px;">
    <?php
if ($_SESSION['role'] == 'ADMIN') {
    ?>
            <li class="breadcrumb-item my-2"><a href="addproject.php">Add New</a></li>

          <?php
}
?>

            <li class="breadcrumb-item my-2"><a href="projectview.php">View</a></li>
            <?php
if ($_SESSION['role'] == 'ADMIN') {
    ?>

            <li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>
            <li class="breadcrumb-item my-2"><a href="assingto.php">Assign To</a></li>

            <?php
}
?>
    </li>

  </ul>
</nav>







<div class="footer">
    <!-- Footer  -->
  <div class="container-fluid text-dark" style="background-color: #DCDCDC;">
    <div class="row">
      <div class="col-sm-8 mt-3 mb-3">
        <p class="text-center">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
      </div>
      <div class="col-sm-4   mt-3 mb-3">
        <div class="d-flex justify-content-around">
          <div> <a href="#"><img src="./svg/facebook-3.svg" alt="" height="30" width="30" srcset=""></a></div>
          <div><img src="./svg/linkedin-icon-2.svg" alt="" srcset="" height="30" width="30"></a></div>
          <div><img src="./svg/twitter-3.svg" alt="" srcset="" height="30" width="30"></a></div>
        </div>
      </div>
    </div>
  </div>


  </div>






  <footer class="bd-footer py-4 "  style="background-color:#DCDCDC; margin-top:130px;">
        <div class="container  ">
        <div class="row">
      <div class="col-sm-8 mt-3 mb-3">
        <p class="text-center">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
      </div>
      <div class="col-sm-4 mt-3 mb-3">
        <div class="d-flex justify-content-around">
        <div class="instagram"> <a href="#" ><i class="fa fa-github" style='font-size:35px;color: black'>&nbsp;  </i></a></div>

          <div  class="face"><a href="#"><i class="fa fa-facebook-official" style='font-size:35px;color:blue '>&nbsp; </i></a></div>
          <div><a href="#"><i  class="fa fa-linkedin-square" style="font-size:35px;color:blue">&nbsp;</i></a></div>
        </div>
      </div>
    </div>
  </div>
        </div>

    </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>

</body>

</html>