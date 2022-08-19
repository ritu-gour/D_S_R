<?php
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boostrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- js and jquery  -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- external css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

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



    .bg {

        position: absolute;
        z-index: -1;
        width: 100%;
        opacity: 0.8;
        top: 0;
    }

    .img {
        width: 50px;
        height: 50px;
    }
    </style>

</head>

<body>

    <!-- navbar  -->

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
                <li class="breadcrumb-item my-2"><a href="assingto.php" style="color: black;">Assign To</a></li>

                <?php
            }
            ?>
                <?php
            if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'DEVELOPER') {
            ?>

                <!--<li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>-->
                <li class="breadcrumb-item my-2"><a href="#"> Assign View</a></li>

                <?php
            }
            ?>
                </li>
            </div>
        </ul>
    </nav>

    <div class="container my-5 shadow rounded  bg-light">


        <h3 class="text-center" style="font-size: 22px;"></h3>
        <hr>

        <div class="table-responsive">
            <table class="table table-hover my-3 py-3" id="datatable">
                <thead style="background-color:black ;">
                    <tr style="color:white;">

                        <th>First name</th>
                        <th>Last name</th>
                        <th>Project name</th>
                        <th>Assign date</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">

          <?php
         $query = "SELECT firstname,lastname,projectname,assign_date
         FROM tbl_registration
         INNER JOIN tbl_project_assign_team
         ON tbl_registration.emp_id = tbl_project_assign_team.emp_id
         INNER JOIN tbl_project
         ON tbl_project.Project_ID = tbl_project_assign_team.project_id";
        //$query="SELECT tbl_registration.emp_id,tbl_registration.firstname FROM tbl_registration INNER JOIN tbl_project ON tbl_registration.emp_id=tbl_project.Project_ID";-->
          $fire = mysqli_query($con,$query) or die("can not ".mysqli_error($con));
          if(mysqli_num_rows($fire) > 0){
          while($user = mysqli_fetch_array($fire)) { ?>
                    <tr>
                        <td>
                            <?php echo $user['firstname']?>
                        </td>
                        <td>
                            <?php echo $user['lastname']?>
                        </td>
                        <td>
                            <?php echo $user['projectname']?>
                        </td>
                       
                        <td>
                            <?php echo $user['assign_date']?>
                        </td>

                        <?php
            }
          }
            ?>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [,10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
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