<?php

//session_start();

//include '../Config/Dbcon.php';

session_start();
if (isset($_SESSION['emp_id'])) {
} else {
    header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
//include '../Config/Dbcon.php';

?>

<?php
// require("../config/Dbcon.php");
include '../config/dbcon.php';
if ((isset($_GET['upd1']))) {
    $user_id = $_GET['upd1'];
    $query = "SELECT * FROM tbl_leave where user_id=$user_id";
    $fire = mysqli_query($con, $query) or die("can not database." . mysqli_error($con));
    $user = mysqli_fetch_assoc($fire);

}
//---update----
if ((isset($_POST['btnupdate']))) {
    $leave_status = $_POST['leave_status'];
    $admin_message = $_POST['admin_message'];

    $query = "UPDATE tbl_leave SET leave_status='$leave_status',admin_message='$admin_message' where user_id=$user_id";
    $fire = mysqli_query($con, $query) or die("can not." . mysqli_error($con));

    if ($fire) {
        ?>
<script>
alert('Data Updated');
</script>
<?php
header("location:admin.php");
    } else {
        ?>
<script>
alert('Data Not Updated');
</script>
<?php

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<heead>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


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
        z-index: 200;
        top: 0;
        left: 0;
        background-color: rgb(5, 3, 3);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 30px;
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



        <nav class="navbar navbar-expand-sm shadow rounded bg-light" style="background-color: #DCDCDC;">
            <ul class="navbar-nav">
                <li class="nav-item active" class="breadcrumb-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <div class="d-flex flex-row ">

                    <li class="nav-item" style="margin-left:60px;">


                        <?php
if ($_SESSION['role'] == 'ADMIN') {
    ?>

                   
                    <li class="breadcrumb-item my-2"><a href="../leavemanagemet/viewleave.php" style="color: black;">Pending</a></li>
                    <li class="breadcrumb-item my-2"><a href="../leavemanagemet/history.php"style="color: black;">History</a></li>
                    <li class="breadcrumb-item my-2"><a href="../admin/admin.php"style="color: black;">View leave</a></li>

                    <?php
} else if ($_SESSION['role'] == 'ADMIN')

{
    ?>
                    <li class="breadcrumb-item my-2"><a href="applyleave.php">Apply</a></li>
                    <li class="breadcrumb-item my-2"><a href="viewleave.php">Pending</a></li>
                    <li class="breadcrumb-item my-2"><a href="history.php">History</a></li>

                    <?php
}

?>
                    </li>
                </div>
            </ul>
        </nav>

        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-5 shadow rounded bg-light ">
                    <h3 class="text-center">Update data</h3>
                    <hr>

                    <form name="signup" id="signup" action="#" method="POST">


                        <div class="mb-3">
                            <label for="status" class="form-label bolder">Leave Status</label>
                            <select value="<?php echo $user['leave_status'] ?>" name="leave_status" id="status"
                                class="form-select bolder" aria-label="Default select example">
                                <option selected>Leave Status</option>
                                <option value="Approved">Approved</option>
                                <option value="Reflected">Reflected</option>
                                <option value="Extended">Extended</option>
                            </select>
                        </div>

                        <div class="mb-3 bolder">
                            <label for="exampleInputPassword1" class="form-label">Approved By</label>
                            <input value="<?php echo $_SESSION['emp_id']; ?>" type="text" class="form-control bold"
                                placeholder="" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 bolder">
                            <label for="exampleFormControlTextarea1" class="form-label">Admin Message</label>
                            <textarea value="<?php echo $user['admin_message'] ?>" name="admin_message"
                                class="form-control bold" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <button name="btnupdate" type="submit" class="btn btn-primary" id="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        <footer class="bd-footer py-4 " style="background-color:#DCDCDC; margin-top:130px;">
            <div class="container  ">
                <div class="row">
                    <div class="col-sm-8 mt-3 mb-3">
                        <p class="text-center">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
                    </div>
                    <div class="col-sm-4 mt-3 mb-3">
                        <div class="d-flex justify-content-around">
                            <div class="instagram"> <a href="#"><i class="fa fa-github"
                                        style='font-size:35px;color: black'>&nbsp; </i></a></div>

                            <div class="face"><a href="#"><i class="fa fa-facebook-official"
                                        style='font-size:35px;color:blue '>&nbsp; </i></a></div>
                            <div><a href="#"><i class="fa fa-linkedin-square"
                                        style="font-size:35px;color:blue">&nbsp;</i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </body>

</html>