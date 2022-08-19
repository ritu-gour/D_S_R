<?php

session_start();
if (isset($_SESSION['emp_id'])) {
} else {
   // header("location: ../start/userLogin.php"); // for two folders
    header("location:../index.php"); // for two folders
}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
include '../config/dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> MicroTechnologies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            background: #134E5E;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            
        }



        .img {
            border-radius: 50%;
            width: 45px;
            height: 40px;
        }

        .box-shadow {
            border: 8px solid rgba(99, 169, 193, 0.07);
            box-sizing: border-box;
            box-shadow: 2px 4px 0px rgba(0, 0, 0, 0.26);
            /* background: #193640;*/
        }


        .flip-card {
            background-color: transparent;
            width: 320px;
            height: 240px;
            perspective: 1000px;
            margin-left: 6px;
            /* background: #193640;*/
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            border: 8px solid rgba(99, 169, 193, 0.07);
            box-shadow: 2px 4px 0px rgba(0, 0, 0, 0.26);
            box-sizing: border-box;
            /* background: #193640;*/
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #193640;
            color: white;

        }

        .flip-card-back {
            background-color: black;
            color: white;
            transform: rotateY(180deg);
        }

        .btn-primary {
            width: 100px;
            border-radius: 20px;
            color: white;
        }


        .btn-primary {
            width: 100px;
            border-radius: 20px;
            border-color: #134E5E;
            font-weight: bold;
            font: 30px;

            color: #000;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            line-height: 37px;
            background-color: #134E5E;
        }



        .footer {
            height: 10vh;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #957bda;
            color: black;

            text-align: center;
        }

        #title-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 12;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
               <b style="font-size: larger; ">Daily Status Report </b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                </ul>
                <a class="navbar-brand" href="#">
                    <?php echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($_SESSION['image']) . '"/>' ?>
                    &nbsp;&nbsp; <b><?php echo $_SESSION['firstname']; ?></b></a>
            </div>
        </div>
    </nav>

 <div class="container my-3 ">
        <div class="" id="title-list">
            <div class=" my-2">
                <a href="dashboard.php" class="btn btn-primary" style="color:white;">HOME</a>
            </div>
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
                <div class=" my-2">
                    <a href="../user/addUser.php"><button class="btn btn-primary" style="color:white;">USER</button></a>
                </div>
            <?php
            }
            ?>
            <?php
            if ($_SESSION['role'] == 'DEVELOPER') {
            ?>
                <div class=" my-2">
                    <a href="../user/viewuserprofile.php"><button class="btn btn-primary" style="color:white;">PROFILE</button></a>
                </div>

            <?php
            }
            ?>
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
                <div class=" my-2">
                    <a href="../project/addproject.php"><button class="btn btn-primary" style="color:white;">PROJECT</button></a>
                </div>

            <?php
            }
            ?>
            <?php
            if ($_SESSION['role'] == 'DEVELOPER') {
            ?>
                <div class=" my-2">
                    <a href="../project/projectview.php"><button class="btn btn-primary" style="color:white;">PROJECT</button></a>
                </div>

            <?php
            }
            ?>

            <div class=" my-2">
                <a href="../dsr/submit.php"><button class="btn btn-primary" style="color:white;">DSR</button></a>
            </div>
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
                <div class=" my-2">
                <a href="../leavemanagemet/viewleave.php"><button class="btn btn-primary" style="color:white;">LEAVE</button></a>
            </div>

            <?php
            }
            ?>
             <?php
            if ($_SESSION['role'] == 'DEVELOPER') {
            ?>
             <div class=" my-2">
                <a href="  ../leavemanagemet/applyleave.php"><button class="btn btn-primary" style="color:white;">LEAVE</button></a>
            </div>
            <?php
            }
            ?>
             <?php
            if ($_SESSION['role'] == 'DEVELOPER') {
            ?>
                <div class=" my-2">
                    <a href="../start/msgview.php"><button class="btn btn-primary" style="color:white;">MASSAGE</button></a>
                </div>
            <?php
            }
            ?>
             <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
                <div class=" my-2">
                    <a href="../start/msg.php"><button class="btn btn-primary" style="color:white;">MASSAGE</button></a>
                </div>
            <?php
            }
            ?>
          <div class=" my-2">
                <a href="logout.php"><button class="btn btn-primary" style="color:white;">LOGOUT</button></a>
            </div>
        </div>
    </div>

    <div class="container my-5 ">
        <?php
        if ($_SESSION['role'] == 'ADMIN') {

        ?>
            <div class="row">
                <div class="col-sm-4 py-3 py-sm-0">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h5 class="my-3 py-5" style="font-size: 45px;">TOTAL EMPLOYEE</h5>
                            </div>
                            <div class="flip-card-back">
                                <h5 class="my-3 py-5" style="color: white;font-size: 35px;">TOTAL EMPLOYEE <br><br>
                                    <?php
                                    $result = mysqli_query($con, "SELECT * FROM tbl_registration");
                                    $rows = mysqli_num_rows($result);
                                    echo  $rows;
                                    ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 py-3 py-sm-0">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h5 class="my-3  py-5" style="font-size: 45px;">ONGOING PROJECT</h5>
                            </div>
                            <div class="flip-card-back">
                                <h5 class=" my-1 py-5" style="color: white;font-size: 35px;">ONGOING PROJECT <br>
                                    <p class="my-3">
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM tbl_project where prostatus='Ongoing'");
                                        $rows = mysqli_num_rows($result);
                                        echo  $rows;
                                        ?>
                                    </p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 py-3 py-sm-0">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h5 class="my-3 py-5" style="font-size: 45px;">COMPLETED PROJECT</h5>
                            </div>
                            <div class="flip-card-back">
                                <h5 class=" my-3 py-5" style="color:white;font-size: 35px;">COMPLETED PROJECT <br>
                                    <p class="my-3">
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM tbl_project where prostatus='Completed'");
                                        $rows = mysqli_num_rows($result);
                                        echo  $rows;
                                        ?>
                                    </p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else {

        ?>
            <div class="row ">
                <div class="col-sm-4 py-3 py-sm-0">
                </div>
                <div class="col-sm-4 my-3 py-3 py-sm-0">

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">

                                <h5 class=" my-3 py-5" style="font-size: 45px;">ADMIN MESSAGE</h5>
                            </div> 
                            
                            <div class="flip-card-back">
                            
                            <?php
                            $query = "SELECT COUNT(message) FROM tbl_message WHERE emp_id='$DEVELOPER'";
                            $fire = mysqli_query($con, $query);
                            if (mysqli_num_rows($fire) >= 0) {
                            while ($user = mysqli_fetch_array($fire)) { ?>
                               <a href="msgview.php"> <h5 class=" my-3 py-5" style="color:white;font-size: 35px;"><?php  echo $user['COUNT(message)']?> <br><br></h5>
                               </a>
                                <?php
            }
          }
            ?>

                                </div>
                            
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 py-3 py-sm-0">

                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="footer">
        <!-- Footer  -->
        <div class="container-fluid text-dark" style="background-color: #DCDCDC;">
            <div class="row">
                <div class="col-sm-8 mt-3 mb-3">
                    <p class="text-center">Copyright &#169; 2021 Daily Status Report All Right Reserved</p>
                </div>
                <div class="col-sm-4   mt-3 mb-3">
                    <div class="d-flex justify-content-around">
                        <div class="instagram"> <a href="#"><i class="fa fa-github" style='font-size:35px;color: black'>&nbsp; </i></a></div>

                        <div class="face"><a href="#"><i class="fa fa-facebook-official" style='font-size:35px;color:black'>&nbsp; </i></a></div>
                        <div><a href="#"><i class="fa fa-linkedin-square" style="font-size:35px;color:black">&nbsp;</i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
   
</body>

</html>