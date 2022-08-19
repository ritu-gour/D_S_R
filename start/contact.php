
<?php

session_start();
if (isset($_SESSION['emp_id'])) {
} else {
   // header("location: ../start/userLogin.php");
   header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
//require("../config/dbcon.php");
?>
<?php
require("../config/dbcon.php");

if (isset($_POST['submit'])) {

    $name= $_POST['name'];
    $email= $_POST['email'];
    $mob = $_POST['mob'];
    $password =md5($_POST['password']);
   


    $query = "INSERT INTO `tbl_contact`(`name`, `email`, `mob`, `password`) VALUES ('$name','$email','$mob','$password')";
    $fire = mysqli_query($con, $query) or die("con not insert the data." . mysqli_error($con));

    if ($fire) { ?> <script>
alert("data submit to database");
</script>
<?php

    } else {


    ?>

<script>
alert('Not submit');
</script>

<?php
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> MicroTechnologies</title>
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

    
    </style>
</head>

<body>
    <?php include '../common/sidenav.php'?>

   







    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-4 shadow rounded mt-5 mb-5">
                <h4 class="text-center my-3">Contact</h4>
                <hr class="bg-danger" />
                <form action="#" method="POST">
                <div class="form-group my-2">
                        <label for="usr">Name</label>
                        <input type="text" name="name" class="form-control" id="usr" required placeholder="Enter Name" >
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required placeholder="Enter Email" >
                    </div>
                    <div class="form-group my-2">
                        <label for="usr">Mobile</label>
                        <input type="text" name="mob" class="form-control" id="usr" required placeholder="Enter Mobile">
                    </div>
                    <div class="form-group my-2">
                        <label for="usr">Password</label>
                        <input type="text" name="password" class="form-control" id="usr" required placeholder="Enter Password">
                    </div>
                    <div class="my-4">
                    <button type="submit" class="btn btn-primary btn-block mb-5" name="submit">Send</button>
       </div>
                </form>
                   
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>



    

    
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
