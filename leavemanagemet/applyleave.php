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
$role= $_SESSION['role'];
//include '../Config/Dbcon.php';


?>
<?php 

require("../config/dbcon.php");

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $leave_type = $_POST['leave_type'];
    $leave_reason= $_POST['leave_reason'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $applied_on=$_POST['applied_on'];
    // $admin_message=$_POST['admin_message'];

  

    $query = "INSERT INTO `tbl_leave`(`user_id`, `leave_type`, `leave_reason`, `from_date`, `to_date`,`applied_on`) 
    VALUES ('$user_id',' $leave_type','$leave_reason','$from_date','$to_date','$applied_on')";

    $fire = mysqli_query($con, $query) or die("con not insert the data.".mysqli_error($con));
  
    if ($fire) { ?> <script>
alert("data submitted to database");
header('location:viewleave.php');
</script>
<?php
    
    } else {
    
    
    ?>

<script>
alert('Not Submitted');
</script>

<?php
    }
}


?>



<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- quick sand font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>Apply</title>
    
    <!-- link css -->
    <style>
   

    /*body{
    background-color: black;
}*/
    
    </style>

   
   

</head>

<body>

    <?php  include '../common/sidenav.php' ?>


    <nav class="navbar navbar-expand-sm  bg-light navbar-light shadow rounded  bg-light">
        <ul class="navbar-nav">
            <li class="nav-item active" class="breadcrumb-item">
                <a class="nav-link" href="#"></a>
            </li>
            <div class="d-flex flex-row ">
                <li class="nav-item" style="margin-left:60px;">


                    <?php
           if($_SESSION['role']=='ADMIN'){
           ?>

               <!-- <li class="breadcrumb-item my-2" style="margin-left:80px;"><a style="color:black;"
                        href="../admin/admin.php">View leave</a></li>-->
                        
                        
                <?php
            }
            else
            {
            ?>
               
                <?php
            }
            
            ?>
             <li class="breadcrumb-item my-2"><a href="applyleave.php">Apply</a></li>
                <li class="breadcrumb-item my-2"><a href="viewleave.php" style="color:black;">Pending</a></li>
                <li class="breadcrumb-item my-2"><a href="history.php" style="color:black;">History</a></li>
               

                </li>
            </div>
        </ul>
    </nav>
   
    <div id="">
        <div id="" class="container "></div>
        <div class="container  ">
            <div class="row justify-content-center ">
                <div class="col-12 col-sm- col-md-8  shadow rounded mt-5 mb-5 bg-light">
                    <h4 class="text-center">APPLY</h4>
                    <hr class="bg-danger" />
                    <form action="#" class="mb-3" method="POST">
                        <div class="row g-1 align-items-center justify-content-around">
                            <div class="col-6">

                                <label for="id" class="form-label font-bolder">User id/Name</label>
                                <input type="text" name="user_id" value="<?php echo $_SESSION['emp_id']?>"
                                    class="form-control font-bold" placeholder="Enter Your User_id/Name" id="id">

                            </div>
                            <div class="col-6 ">
                                <label for="id" class="form-label font-bolder">Leave Type</label>
                                <select name="leave_type" class="form-select font-bold"
                                    aria-label="Default select example">
                                    <option class="font-bold" selected>Leave Type</option>
                                    <option class="font-bold" value="1">Cl</option>
                                    <option class="font-bold" value="2">El</option>
                                    <option class="font-bold" value="2">Compensate</option>
                                    <option class="font-bold" value="2">Other</option>
                                </select>

                            </div>
                            <div class="row g-1 align-items-center justify-content-around ">
                                <div class="col-6">

                                    <label for="applyDate" class="form-label font-bolder my-3">Applied On</label>
                                    <div class="mb-4">
                                        <input type="date" name="applied_on" value="<?php echo date('Y-m-d');?>"
                                            class="form-control font-bold" id="applyDate">
                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="">
                                        <label for="leaveDate" class="form-label font-bolder">From Date </label>
                                        <input name="from_date" type="date" class="form-control font-bold"
                                            id="leaveDate">
                                    </div>
                                </div>
                                <div class="row g-1 ">
                                    <div class="col-6">
                                        <div class="">
                                            <label for="leaveDate" class="form-label font-bolder">To Date: </label>
                                            <input name="to_date" type="date" class="form-control font-bold"
                                                id="leaveDate">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <label for="reason" class="form-label font-bolder ">Reason</label>
                                        <textarea name="leave_reason" class="form-control font-bold" id="reason"
                                            placeholder="Enter Your Reason " rows="2"></textarea>

                                    </div>
                                </div>
                                <div class="row  g-1 ">
                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        <button type="button" name="submit" class="btn btn-primary">Cancel</button>
                                    </div>




                                    <div class="d-flex justify-content-between   mb-3">

                                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

          </div>

</div>
    <footer class="bd-footer py-4 " style="background-color:#DCDCDC; margin-top:0px;">
        <div class="container  ">
            <div class="row">
                <div class="col-sm-8 mt-3 mb-3">
                    <p class="text-center "  style="color:black;">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
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


    <!-- particles -->
    <script type="text/javascript" src="../apply/js/particles.min.js"></script>
    <script type="text/javascript" src="../apply/js/app.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>