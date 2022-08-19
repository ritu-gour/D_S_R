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
include '../config/dbcon.php';

?>
<?php

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $Project_ID = $_POST['Project_ID'];
    $assign_date = $_POST['assign_date'];

    $query = "INSERT INTO  `tbl_project_assign_team`(`emp_id`, `Project_ID`, `assign_date`)
    VALUES('$emp_id','$Project_ID','$assign_date')";

    $fire = mysqli_query($con, $query) or die("con not insert the data." . mysqli_error($con));

    if ($fire) { ?> <script>
            alert("data submitted to database");
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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- link local css -->
    <!-- <link rel="stylesheet" href="/index.css"> -->
    <link rel="stylesheet" href="../css/sidenav.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
        }

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
            z-index: 500;
            box-shadow: 0 0 11px 0 gainsboro;
            padding: 2rem 2rem;
            border-radius: 8px;
            margin-top: 4rem;
            font-weight: bold;

        }

        .text-center {
            text-align: center;
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

    <title>Assign To</title>
</head>

<body>

    <?php include '../common/sidenav.php' ?>


    <nav class="navbar navbar-expand-sm bg-light navbar-light shadow rounded  bg-light ">
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
                <li class="breadcrumb-item my-2"><a href="addproject.php" style="color:black;">Add New</a></li>

            <?php
                    }
            ?>

            <li class="breadcrumb-item my-2"><a href="projectview.php" style="color:black;">View</a></li>
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>

                <!--<li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>-->
                <li class="breadcrumb-item my-2"><a href="#">Assign To</a></li>

            <?php
            }
            ?>
             <?php
            if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'DEVELOPER') {
            ?>

                <!--<li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>-->
                <li class="breadcrumb-item my-2"><a href="assignview.php" style="color: black;">Assign View</a></li>

            <?php
            }
            ?>
            </li>
            </div>
        </ul>
    </nav>
   
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-6 col-lg-4 mt-4 shadow rounded  bg-light my-4" id="" >
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <h3 class="text-center ">Assigned To </h3>
                    <div class="mb-3">
                        <label for="empid" class="form-label">Empid/Ename</label>
                        <?php
                        $query = "SELECT * FROM tbl_registration";
                        $fire = mysqli_query($con, $query);
                        ?>
                        <select name="emp_id" id="emp_id" class="form-select" aria-label="Default select example">
                            <option selected>Empid/Ename</option>

                            <?php
                            if (mysqli_num_rows($fire) > 0) {
                                while ($user = mysqli_fetch_assoc($fire)) { ?>
                                    <option value="<?php echo $user['emp_id'] ?>"><?php echo $user['emp_id'] ?> | <?php echo $user['firstname'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Project_ID" class="form-label">Projectid/Pname</label>
                        <?php
                        $query = "SELECT * FROM tbl_project";
                        $fire = mysqli_query($con, $query);
                        ?>
                        <select id="Project_ID" name="Project_ID" class="form-select" aria-label="Default select example">
                            <option selected>Prodectid/Pname</option>
                            <?php
                            if (mysqli_num_rows($fire) > 0) {

                                while ($user = mysqli_fetch_assoc($fire)) { ?>

                                    <option value="<?php echo $user['Project_ID'] ?>"><?php echo $user['Project_ID'] ?> | <?php echo $user['projectname'] ?></option>
                            <?php

                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date Assign</label>
                        <input name="assign_date" type="date" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px;">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
    </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>