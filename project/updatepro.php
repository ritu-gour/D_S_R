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
?>
<?php
require("../config/dbcon.php");
if (isset($_GET['upd1'])) {
    $project_id = $_GET['upd1'];
    $query  = "SELECT *FROM tbl_project WHERE project_id='$project_id'";
    $fire = mysqli_query($con, $query) or die("can not the data selected." . mysqli_error($con));
    if ($fire)
        $user = mysqli_fetch_assoc($fire);
}

if (isset($_POST['btnupdate'])) {
    $projectname = $_POST['projectname'];
    $projecttechno = $_POST['projecttechno'];
    $duration = $_POST['duration'];
    $initilizedate = $_POST['initilizedate'];
    $projectclient = $_POST['projectclient'];
    $prostatus = $_POST['prostatus'];
    $proclincon = $_POST['proclincon'];
    $compledate = $_POST['compledate'];

    $query = " UPDATE tbl_project SET projectname='$projectname',projecttechno='$projecttechno',
    duration='$duration' ,initilizedate='$initilizedate',projectclient='$projectclient'
    ,prostatus='$prostatus',proclincon='$proclincon',compledate='$compledate' WHERE project_id= '$project_id'";
    $fire = mysqli_query($con, $query) or die("can not update the database." . mysqli_error($con));

    if ($fire) {
        header("location:projectview.php");
    } else {
        echo "Not Update";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> MicroTechnologies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #particles-js {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: -10;
            top: 0;
            left: 0
        }

        #container {

            position: absolute;
            padding: 1rem 2rem;
            z-index: 500;
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

    <?php include '../common/sidenav.php' ?>


    <nav class="navbar navbar-expand-sm bg-light navbar-light shadow rounded  bg-light">
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
                <li class="breadcrumb-item my-2"><a href="addProject.php" style="color:black;">Add New</a></li>

            <?php
                    }
            ?>

            <li class="breadcrumb-item my-2"><a href="projectview.php" style="color:black;">View</a></li>
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
                <!--<li class="breadcrumb-item my-2"><a href="#">Update</a></li>-->
                <li class="breadcrumb-item my-2"><a href="assingto.php" style="color:black;">Assign To</a></li>
            <?php
            }
            ?>
            </li>
            </div>
        </ul>
    </nav>
    <div id="" class="container "></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm- col-md-8  shadow rounded mt-5 mb-5 bg-light">
                <h4 class="text-center"> Project Edit</h4>
                <hr class="bg-danger" />
                <form action="#" class="mb-3" name="submit" id="" method="POST">
                    <div class="row g-1 align-items-center justify-content-around">
                        <div class="col-6">
                            <div class="">
                                <label for="projectname">Project Name :</label>
                                <input value="<?php echo $user['projectname'] ?>" type="text" class="form-control" id="" name="projectname" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="">
                                <label for="compledate">Completed Date :</label>
                                <input value="<?php echo $user['compledate'] ?>" type="date" class="form-control my-1" id="" name="compledate" />
                            </div>
                        </div>
                        <div class="row g-1 ">
                            <div class="col-6">
                                <div class="">
                                    <label for="duration">Duration:</label>
                                    <input value="<?php echo $user['duration'] ?>" type="text" class="form-control" id="" name="duration" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <div class="">
                                        <label for="initilizedate">Initilize Date:</label>
                                        <input value="<?php echo $user['initilizedate'] ?>" type="date" class="form-control " id="" name="initilizedate" />
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-6">
                                    <div class="">
                                        <label for="projectclient">Project Client :</label>
                                        <input value="<?php echo $user['projectclient'] ?>" type="text" class="form-control" id="" name="projectclient" />
                                    </div>
                                </div>
                                <div class="col-6  ">
                                    <div class=" ">
                                        <label for="prostatus" class="">Project Status</label>
                                        <select value="<?php echo $user['prostatus'] ?>" name="prostatus" class="form-select" aria-label="Default select example">

                                            <option value="Vet to start">Yet to start</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Partial Completed">Partial Completed</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row  g-1 py-1 ">
                                <div class="col-6">
                                    <div class="">
                                        <label for="proclincon">Project Client Contact:</label>
                                        <input value="<?php echo $user['proclincon'] ?>" type="text" class="form-control" id="" name="proclincon" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="projecttechno" style="margin-left:10px;">Project Technology</label>
                                    <textarea value="<?php echo $user['projecttechno'] ?>" name="projecttechno" class="form-control" id="projec_techno" rows="2">
            <?php echo $user['projecttechno'] ?>
          </textarea>
                                </div>
                            </div>
                            <div class="row g-1 ">
                                <div class="col-12">
                                    <div class="d-grid  my-2">
                                        <button class="btn btn-primary" name="btnupdate" type="btnupdate">Update</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between   mb-3">
                            </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
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