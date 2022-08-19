<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Daily Status Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <style>
    body {


        font-family: 'Roboto', sans-serif;
        
    }

    .img1 {
        border-radius: 50%;
        width: 75px;
        height: 75px;
        margin-left: 60px;
        justify-content: center;
        align-items: center;
        margin-top: 35px;

    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
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
    </style>
</head>

<body>

    <div id="mySidenav" class="sidenav" class=" sticky-top">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white;">&times;</a>
        <?php echo '<img class="img1" src="data:image/jpeg;base64,' . base64_encode($_SESSION['image']) . '"/>' ?>


        <p class="textCenter text-white my-3" style="margin-left:64px; font-size:20px;">
            <?php echo $_SESSION['firstname'] ?>

        </p>

        <ul>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <p class="textCenter text-white">
                <a href="../start/dashboard.php" class='fa fa-building'
                    style="font-size:19px; margin-right:70px; margin-top:20px; color:white; ">&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
            </p>
            <?php
    if ($_SESSION['role'] == 'ADMIN') {
    ?>
            <p class="textCenter text-white">
                <a href="../user/addUser.php" class="fas fa-user-circle"
                    style="font-size:19px;  margin-right:120px; margin-top:20px ; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;User
                </a>
            </p>
            <?php
    }
    ?>
            <?php
    if ($_SESSION['role'] == 'DEVELOPER') {
    ?>
            <p class="textCenter text-white">
                <a href="../user/viewuserprofile.php" class="fas fa-user-circle"
                    style="font-size:19px;  margin-right:120px;margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;User
                     </a>
            </p>
            <?php
    }
    ?>

            <?php
    if ($_SESSION['role'] == 'ADMIN') {
    ?>
            <p class="textCenter text-white">
                <a href="../project/addproject.php" class='fas fa-chalkboard-teacher'
                    style="font-size:19px;  margin-right:200px;margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;Project</a>
            </p>
            <?php
    }
    ?>
            <?php
    if ($_SESSION['role'] == 'DEVELOPER') {
    ?>
            <p class="textCenter text-white">
                <a href="../project/projectview.php" class='fas fa-chalkboard-teacher'
                    style="font-size:19px; margin-right:200px; margin-top:20px; color:white;">&nbsp;&nbsp;Project</a>
            </p>
            <?php
    }
    ?>
            <p class="textCenter text-white">
                <a href="../start/contact.php" class="fa fa-phone-square"
                    style="font-size:19px; margin-right:30; margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Contact</a>
            </p>
            <p class="textCenter text-white">
                <a href="../dsr/submit.php" class='fas fa-calendar-alt'
                    style="font-size:17px; margin-right:68px; margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DSR</a>
            </p>
            <?php
    if ($_SESSION['role'] == 'ADMIN') {
    ?>
            <p class="textCenter text-white">
                <a href="../leavemanagemet/viewleave.php" class="fa fa-address-card"
                    style="font-size:19px; margin-right:80px; margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;Leave</a>
            </p>
            <?php
          }
    ?>
<?php
if ($_SESSION['role'] == 'DEVELOPER') {
    ?>
            <p class="textCenter ">
                <a href=" ../leavemanagemet/applyleave.php" class="fa fa-address-card"
                    style="font-size:19px;  margin-right:80px;margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;Leave</a>
            </p>
            <?php
    }
    ?>
 <?php
            if ($_SESSION['role'] == 'DEVELOPER') {
            ?>
             <p class="textCenter ">
                <a href=" ../start/msgview.php" class="fa fa-envelope"
                    style="font-size:19px;  margin-right:80px;margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;Message</a>
            </p>
              
            <?php
            }
            ?>
           
<?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
             <p class="textCenter ">
                <a href=" ../start/msg.php" class="fa fa-envelope"
                    style="font-size:19px;  margin-right:80px;margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;Message</a>
            </p>
             
            <?php
            }
            ?>

            <a href="../start/logout.php" class="fas fa-sign-out-alt"
                style="font-size:18px; margin-right:40px; margin-top:20px; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
                <li> <a href="#"><i class="fas fa-file-export"></i> <span class="nav-label">Exports</span></a> </li>
        </ul>
    </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()" >&#9776; </span>

            <a class="navbar-brand " href="#">
             <b style="margin-top:50px; font-size:21px;">Daily Status Report</b>
             
                <a class="navbar-brand" href="#"
                    style="color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item dropdown">

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                        </li>

                    </ul>

                </div>
        </div>
    </nav>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


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