<?php

//session_start();
session_start();
if (isset($_SESSION['emp_id'])) {
} else {
  //header("location: ../start/userLogin.php"); // for two folders
  //header('location:index.php');
  header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role= $_SESSION['role'];
//include '../Config/Dbcon.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

        color: white;
        text-align: center;
    }
    </style>
</head>

<body>

    <?php include '../common/commonNav.php'?>


    <nav class="navbar navbar-expand-sm shadow rounded  bg-light " style="background-color: #DCDCDC;">
        <ul class="navbar-nav">
            <li class="nav-item active" class="breadcrumb-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item" style="margin-left:60px;">


                <?php
           if($_SESSION['role']=='ADMIN'){
           ?>

            <li class="breadcrumb-item my-2" style="margin-left:80px;"><a href="../Admin/admin.php">Admin</a></li>

            <?php
            }
            else
            {
            ?>
            <li class="breadcrumb-item my-2"><a href="Apply_Leave.php">Apply</a></li>
            <li class="breadcrumb-item my-2"><a href="View_Leave.php">Pending</a></li>
            <li class="breadcrumb-item my-2"><a href="History.php">History</a></li>

            <?php
            }
            
            ?>
            </li>

        </ul>
    </nav>






    <div class="footer">
        <div class="container-fluid text-dark" style="background-color: #DCDCDC;">
            <div class="row">
                <div class="col-sm-8 mt-3 mb-3">
                    <p class="text-center">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
                </div>
                <div class="col-sm-4   mt-3 mb-3">
                    <div class="d-flex justify-content-around">
                        <div> <a href="#"><img src="./svg/facebook-3.svg" alt="" height="30" width="30" srcset=""></a>
                        </div>
                        <div><img src="./svg/linkedin-icon-2.svg" alt="" srcset="" height="30" width="30"></a></div>
                        <div><img src="./svg/twitter-3.svg" alt="" srcset="" height="30" width="30"></a></div>
                    </div>
                </div>
            </div>
        </div>


    </div>







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