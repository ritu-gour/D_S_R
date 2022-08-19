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
$role= $_SESSION['role'];
include '../config/dbcon.php';
?>

<?php 
    //require("../Config/Dbcon.php");


    if(isset($_GET['upd1'])){
        $user_id=$_GET['upd1'];
        $query  = "SELECT *FROM tbl_dsr  WHERE user_id='$user_id'";
        $fire = mysqli_query($con,$query) or die("can not the data selected.".mysqli_error($con));
        if($fire)
        $user = mysqli_fetch_assoc($fire);
    }
    if (isset($_POST['btnupdate'])) {

    //$user_id = $_POST['user_id'];
    $project_id = $_POST['project_id'];
    $dsr_submission_date= $_POST['dsr_submission_date'];
    $dsr_of_date = $_POST['dsr_of_date'];
    $time_taken = $_POST['time_taken'];
    $dsr_text = $_POST['dsr_text'];


    $query = "UPDATE tbl_dsr  SET  project_id='$project_id',dsr_submission_date='$dsr_submission_date',
    dsr_of_date='$dsr_of_date' ,time_taken='$time_taken',dsr_text='$dsr_text' WHERE user_id='$user_id'";
    $fire = mysqli_query($con, $query) or die("con not insert the data.".mysqli_error($con));
  
    if($fire){
        // echo "data update the succesfully";
       header("location:submitview.php") ;
       }else
       {
         echo "Not Update";
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
    <nav class="navbar navbar-expand-sm  bg-light navbar-light shadow rounded  bg-light ">
        <ul class="navbar-nav">
            <li class="nav-item active" class="breadcrumb-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
            </li>
            <div class="d-flex flex-row ">
                <li class="nav-item my-4" style="margin-left:50px;">
                <li class="breadcrumb-item my-2"><a href="submit.php" style="color:black;">Submit</a>
                <li class="breadcrumb-item my-2"><a href="submitview.php" style="color:black;">View</a></li>
                </li>
            </div>
        </ul>
    </nav>


    <div class="container ">
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-4 shadow rounded mt-5 mb-5">
                <h4 class="text-center my-2 "> Dsr Update</h4>
                <hr class="bg-danger" />
                <form action="#" method="POST">

        
                    <div class="my-3">
                        <?php

// include '../Config/Dbcon.php';
                $query = "SELECT DISTINCT project_id FROM tbl_project_assign_team";
                    $fire = mysqli_query($con,$query);

?>
<label for="Select Project">Select Project:</label>
                        <select value="<?php echo $user ['project_id']?>" class="form-select" name="project_id"
                            aria-label="Default select example">
                            

                            <?php
        if(mysqli_num_rows($fire)>0){

           while($user = mysqli_fetch_assoc($fire)){?>

                            <option value="<?php echo $user['project_id']?>"><?php echo $user['project_id']?></option>

                            <?php

           }
          }
           ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="submission">Submission Date :</label>
                        <input value="<?php echo $user ['dsr_submission_date']?>" type="date" class="form-control" id=""
                            name="dsr_submission_date" />
                    </div>
                    <div class="form-group my-2">
                        <label for="DSR_of_Pute">Dsr of Pute :</label>
                        <input value="<?php echo $user ['dsr_of_date']?>" type="date" class="form-control" id=""
                            name="dsr_of_date" />
                    </div>
                    <div class="form-group my-2">
                        <label for="time_taken">Time Taken :</label>
                        <input type="time" value="<?php echo $user['time_taken']?>" class="form-control" id=""
                            name="time_taken" />
                    </div>

                    <div class="my-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Dsr Text</label>
                        <textarea value="<?php echo $user['dsr_text']?>" class="form-control" name="dsr_text"
                            id="dsr_text" rows="2">

            </textarea>
                    </div>
                    <div class="d-grid gap-2">

                        <button class="btn btn-primary" name="btnupdate" type="submit">Update</button>
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