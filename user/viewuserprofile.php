<?php
session_start();
if (isset($_SESSION['emp_id'])) {
} else {
   // header("location: ../start/userLogin.php"); // for two folders
   header("location:../index.php");
}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
// include '../config/dbcon.php';
?>
<?php
require("../config/dbcon.php");
/*if ((isset($_GET['upd']))) {
    $emp_id = $_GET['upd'];
    $query = "SELECT * FROM tbl_registration where emp_id='$emp_id'";
    $fire = mysqli_query($con, $query) or die("can not database." . mysqli_error($con));
    $user = mysqli_fetch_assoc($fire);
}*/
//---update----
if ((isset($_POST['update']))) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $query = "UPDATE tbl_registration SET firstname='$firstname',lastname='$lastname',
     mobile='$mobile',password='$password',address='$address' where emp_id='$DEVELOPER'";
    $fire = mysqli_query($con, $query) or die("can not." . mysqli_error($con));

    if ($fire) {
        //header("location:view_user.php");
        //echo"succe";
?>

<?php
    } else {
        $_SESSION['status'] = "User Updated SuccessFully";
        $_SESSION['status_code'] = "success";

         //header("location:view_user.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<heead>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> MicroTechnologies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/sidenav.css">
    <style>
    .img1 {
        border-radius: 50%;
        width:5px;
        height:5px;
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
        <?php include '../common/sidenav.php' ?>

        <nav class="navbar navbar-expand-sm  shadow rounded  bg-light  ">
            <ul class="navbar-nav">
                <div class="d-flex flex-row ">
                    <li class="breadcrumb-item my-2"><a href="#" style="color:black; margin-left:100px;" >View</a></li>
                    </li>
                </div>
            </ul>
        </nav>
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-5 shadow rounded bg-light ">
                    <h3 class="text-center">User Profile</h3>
                    <hr>

                    <?php
                  include '../config/dbcon.php';
                    $query = "SELECT * FROM tbl_registration where emp_id ='$DEVELOPER'";

                    $fire = mysqli_query($con, $query);

                    while ($user = mysqli_fetch_assoc($fire)) {
                    ?>

                        <form   name="signup" id="signup" action="#" method="POST">
                        <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First name</label>
                                <input   name="firstname" type="text"
                                 class="form-control" 
                                 placeholder="<?php echo $user['firstname'] ?>" >
                            </div>
                            </div>
                            <div class="col-6">
                                
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                <input  name="lastname"  type="text" class="form-control" placeholder="<?php echo $user['lastname'] ?>">
                            </div>
                        </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">DOB</label>
                                <input  disabled type="date" name="dob" class="form-control" placeholder="<?php echo $user['dob'] ?>">
                            </div>

                            </div>
                            <div class="col-6">
                                 <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input  disabled type="email" name="email" class="form-control" placeholder="<?php echo $user['email'] ?>">
                            </div>
                        </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                                <input  name="mobile" type="mobile" class="form-control" placeholder="<?php echo $user['mobile'] ?>">
                            </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input name="password"  type="password" class="form-control" placeholder="Enter Password">
                            </div>
                            </div>
                            </div>
                            <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Satus</label>
                                <input  disabled type="text" name="status" class="form-control" placeholder="<?php echo $user['status'] ?>">
                            </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                <input  disabled type="text" name="gender" class="form-control" placeholder="<?php echo $user['gender'] ?>">
                            </div>
                            </div>
                            </div>
                            <div class="row g-2">
                            <div class="col-6">
                            <div class="mb-3">

                                <label for="exampleFormControlInput1" class="form-label">Role</label>
                                <input disabled  type="text" class="form-control" placeholder="<?php echo $user['role'] ?>">
                            </div>

                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Joining date</label>
                                <input   disabled type="date" name="joining_date" class="form-control" placeholder="<?php echo $user['joining_date'] ?>">
                            </div>
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input name="address"   type="text" class="form-control" placeholder="<?php echo $user['address'] ?>">
                            </div>
                           
                            <button name="update" type="submit" class="btn btn-primary" id="update">Update</button>
                            <!--<a href="#?upd='>'" name="update" type="submit" class="btn btn-primary" id="update" style="margin-bottom: 10px;">Update</a>-->
                        </form>
                    <?php
                    } //end while loop
                    ?>

                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>

</html>
