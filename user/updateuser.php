<?php

//session_start();

session_start();
if (isset($_SESSION['emp_id'])) {
} else {
    //header("location: ../start/userLogin.php"); // for two folders
    header("location:../index.php");
}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
include '../config/dbcon.php';



?>
<?php
require("../config/dbcon.php");
if ((isset($_GET['upd']))) {
    $emp_id = $_GET['upd'];
    $query = "SELECT * FROM tbl_registration where emp_id=$emp_id";
    $fire = mysqli_query($con, $query) or die("can not database." . mysqli_error($con));
    $user = mysqli_fetch_assoc($fire);
}
//---update----
if ((isset($_POST['update']))) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    //    $image = $_POST['image'];
    $address = $_POST['address'];
    $joining_date = $_POST['joining_date'];
    $role = $_POST['role'];

    $query = "UPDATE tbl_registration SET firstname='$firstname',lastname='$lastname',email = '$email' ,mobile='$mobile' ,password='$password',status='$status',gender='$gender',address='$address',joining_date='$joining_date',role='$role' where emp_id=$emp_id";
    $fire = mysqli_query($con, $query) or die("can not." . mysqli_error($con));

    if ($fire) {
        header("location:view_user.php");
?>

<?php
    } else {
        $_SESSION['status'] = "User Updated SuccessFully";
        $_SESSION['status_code'] = "success";

        // header("location:View_User.php");
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
       

        <nav class="navbar navbar-expand-sm  shadow rounded  bg-light   ">
            <ul class="navbar-nav">
                <li class="nav-item active" class="breadcrumb-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">

                </li>
                <div class="d-flex flex-row ">
                    <li class="nav-item my-4" style="margin-left:50px;">
                        <?php
                        if ($_SESSION['role'] == 'ADMIN') {
                        ?>
                    <li class="breadcrumb-item my-2"><a href="addUser.php" style="color:black;">Add New</a></li>
                <?php
                        }
                ?>

                <li class="breadcrumb-item my-2"><a href="View_User.php" style="color:black;">View</a></li>
                <!--<li class="breadcrumb-item my-2"><a href="#">Update</a></li>-->

                </li>
                </div>
            </ul>
        </nav>
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-5 shadow rounded bg-light ">
                    <h3 class="text-center">Update data</h3>
                    <hr>

                    <?php

                    if ($_SESSION['role'] == 'ADMIN') {
                    }

                    ?>

                    <form name="signup" id="signup" action="#" method="POST">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="fName" class="form-label">First Name</label>
                                    <input value="<?php echo $user['firstname'] ?>" name="firstname" type="text" class="form-control" placeholder="Enter Your First Name" id="fName">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="lName" class="form-label">Last Name</label>
                                    <input value="<?php echo $user['lastname'] ?>" name="lastname" type="text" class="form-control" placeholder="Enter Your Last Name" id="lName">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="empId" class="form-label">Employee id</label>
                                    <input disabled value="<?php echo $user['emp_id'] ?>" name="emp_id" type="text" class="form-control" placeholder="Enter Your Employee id" id="empId">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input disabled value="<?php echo $user['email'] ?>" name="email" type="email" class="form-control" id="email" placeholder="Enter Your Email">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="dob" class="form-label"> Dob</label>
                                    <input disabled value="<?php echo $user['dob'] ?>" name="dob" type="date" class="form-control" id="dob">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="joinDate" class="form-label">Joining Date </label>
                                    <input disabled value="<?php echo $user['joining_date'] ?>" name="joining_date" type="date" class="form-control" id="joinDate">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="mNumber" class="form-label">Mobile No.</label>
                                    <input value="<?php echo $user['mobile'] ?>" name="mobile" type="text" class="form-control" placeholder="Enter Your Mobile No." id="mNumber">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="pass" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Enter your Password" id="pass">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select disabled value="<?php echo $user['status'] ?>" name="status" id="status" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $user['status'] ?></option>
                                        <option value="ACTIVE">Active</option>
                                        <option value="DISABLE">Disable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label disabled for="gender" class="form-label">Gender</label>
                                    <select disabled id="gender" value="<?php echo $user['gender'] ?>" name="gender" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $user['gender'] ?></option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-4">
                                    <label disabled for="role" class="form-label">Role</label>
                                    <select disabled id="role" value="<?php echo $user['role'] ?>" name="role" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $user['role'] ?></option>
                                        <option value="ADMIN">Admin</option>
                                        <option value="PROJECT MANAGER">Project Manager</option>
                                        <option value="PROJECT LEAD">Project Lead</option>
                                        <option value="DEVELOPER"> Developer</option>
                                        <option value="OTHER">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <textarea value="<?php echo $user['address'] ?>" name="address" class="form-control" id="address" placeholder="Enter Your Address" rows="3">
                        <?php echo $user['address'] ?>
                    </textarea>
                        </div>
                        <button name="update" type="submit" class="btn btn-primary" id="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>