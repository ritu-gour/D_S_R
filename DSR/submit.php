<?php

session_start();
if (isset($_SESSION['emp_id'])) {
} else {
    //header("location: ../start/userLogin.php");
    header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
//require("../config/dbcon.php");
?>
<?php
require("../config/dbcon.php");

if (isset($_POST['btnsubmit'])) {

    $user_id = $_POST['user_id'];
    $project_id = $_POST['project_id'];
    $dsr_submission_date = $_POST['dsr_submission_date'];
    $dsr_of_date = $_POST['dsr_of_date'];
    $time_taken = $_POST['time_taken'];
    $dsr_text = $_POST['dsr_text'];


    $query = "INSERT INTO `tbl_dsr`(`user_id`, `project_id`, `dsr_submission_date`, `dsr_of_date`, `time_taken`, `dsr_text`) 
    VALUES ('$user_id','$project_id',' $dsr_submission_date','$dsr_of_date','$time_taken ','$dsr_text ')";
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- external css  -->
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;

      color: white;
      text-align: center;
    }

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

    footer {
      background-color: #777;
      padding: 10px;
      text-align: center;
      color: white;
      margin-top: 150px;
    }

   
    </style>
</head>

<body>
    <?php include '../common/sidenav.php' ?>

    <nav class="navbar navbar-expand-sm   bg-light navbar-light shadow rounded  bg-light">
        <ul class="navbar-nav">
            <li class="nav-item active" class="breadcrumb-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">

            </li>
            <div class="d-flex flex-row ">
                <li class="nav-item my-4" style="margin-left:50px;">
                <li class="breadcrumb-item my-2"><a href="#">Submit</a>
                <?php 
          if($_SESSION['role']=='ADMIN'){
          ?>
                <li class="breadcrumb-item my-2"><a href="submitview.php" style="color:black;">View</a></li>
                <?php
      }
      ?>
                <?php 
          if($_SESSION['role']=='DEVELOPER'){
          ?>
                <li class="breadcrumb-item my-2"><a href="userview.php" style="color:black;">User view</a></li>
                <?php
      }
      ?>
                </li>
            </div>
        </ul>
    </nav>
  
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-4 shadow rounded mt-5 mb-5">
                <h4 class="text-center my-2"> DSR</h4>
                <hr class="bg-danger" />
                <form action="#" method="POST">
                    <div class="row g-1 align-items-center justify-content-around">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="userid">User Id :</label>
                                <input value="<?php echo $_SESSION['emp_id']; ?>" type="text" class="form-control" id=""
                                    name="user_id" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="">
                                <?php
                        $query = "SELECT DISTINCT project_id FROM tbl_project_assign_team";
                        $fire = mysqli_query($con, $query);
                        ?>
                                  <label for="selectproject">Select Project:</label>
                                <select class="form-select" name="project_id" aria-label="Default select example">
                                    <option selected>Select project</option>
                                    <?php
                            if (mysqli_num_rows($fire) > 0) {

                                while ($user = mysqli_fetch_assoc($fire)) { ?>
                                    <option value="<?php echo $user['project_id'] ?>"><?php echo $user['project_id'] ?>
                                    </option>
                                    <?php

                                }
                            }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-1 ">
                            <div class="col-6">
                                <div class="form-group my-2">
                                    <label for="submission">Submission Date :</label>
                                    <input type="date" class="form-control" id="" name="dsr_submission_date" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group my-2">
                                    <label for="DSR_of_Put">Dsr Of Put :</label>
                                    <input type="date" class="form-control" id="" name="dsr_of_date" />
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-6">
                                    <div class="form-group my-2">
                                        <label for="Time Taken">Time Taken :</label>
                                        <input type="text" class="form-control" id="" name="time_taken" />
                                    </div>
                                </div>
                                <div class="col-6  ">
                                    <div class="my-2">
                                        <label for="dsr_text">Dsr Text</label>
                                        <textarea class="form-control" name="dsr_text" id="exampleFormControlTextarea1"
                                            rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  g-1 py-1 ">
                            <div class="col-12">
                                <div class="d-grid gap-2">

                                    <button class="btn btn-primary" name="btnsubmit" type="btnsubmit">Submit</button>
                                </div>
                                <div class="d-flex justify-content-between   mb-3">
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