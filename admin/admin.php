<?php
session_start();
if (isset($_SESSION['emp_id'])) {
} else {
    // header('location:index.php');
   // header("location: ../start/userLogin.php"); // for two folders
   header("location:../index.php");

}

$DEVELOPER = $_SESSION['emp_id'];
$firstname = $_SESSION['firstname'];
$role = $_SESSION['role'];
include '../config/dbcon.php';
//include '../Config/Dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- link quicksand font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/sidenav.css">
    <!-- link local css -->
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Quicksand', sans-serif;
    }

    .bg {
        height: 100%;
        position: absolute;
        z-index: -1;
        width: 100%;
        opacity: 0.8;
        top: 0;
    }

    /* utils */
    .bold {
        font-weight: bold;
    }

    .bolder {
        font-weight: bolder;
    }

    


        #form option {
            font-weight: bold;
        }

        .modal-head {
            background-color: #343a40;
            color: white;
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <title>Admin</title>
</head>

<body>
    <?php include '../common/sidenav.php'?>


    <nav class="navbar navbar-expand-sm shadow rounded bg-light" style="background-color: #DCDCDC;">
        <ul class="navbar-nav">
            <li class="nav-item active" class="breadcrumb-item">
                <a class="nav-link" href="#"></a>
            </li>
            <div class="d-flex flex-row ">

                <li class="nav-item" >


                    <?php
if ($_SESSION['role'] == 'ADMIN') {
    ?>

                
                <li class="breadcrumb-item my-2" ><a href="../leavemanagemet/viewleave.php"style="margin-left:40px; color:black;">Pending</a></li>
                <li class="breadcrumb-item my-2"><a href="../leavemanagemet/history.php"  style="color:black;">History</a></li>
                <li class="breadcrumb-item my-2" style="margin-left:px;"><a href="#">View leave</a></li>
                <?php
} else {
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


    <img src="Gale - htmlcolors.com.png" class="bg" alt="">
    <div class="container my-5 shadow rounded mt-5 mb-5 bg-light">
        <div class="table-responsive">

            <div class="table-responsive">

                <h3 class="text-center " style="font-size: 22px; "></h3>
                <table class="table table-hover my-3 py-3" id="datatable">
                    <thead style="background-color:black ;" border="1" cellpadding="5" cellspacing="5">
                        <tr style="color:white;">




                            <th scope="col">Leave Type</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Reason</th>
                            <th scope="col">From Date</th>
                            <th scope="col">To Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="white-cl">
                        <tr>

                            <?php

              $query = "SELECT * from tbl_leave,tbl_registration where tbl_leave.user_id=tbl_registration.emp_id && firstname!='Admin'";

              // $query = "SELECT * FROM tbl_leave_man"; 
              $fire = mysqli_query($con, $query) or die("can not " . mysqli_error($con));
              if (mysqli_num_rows($fire) > 0) {
               while ($user = mysqli_fetch_assoc($fire)) {?> 
                        <tr>

                            <td><?php echo $user['leave_type'] ?></td>
                            <td><?php echo $user['firstname'] ?></td>
                            <td><?php echo $user['leave_reason'] ?></td>
                            <td><?php echo $user['from_date'] ?></td>
                            <td><?php echo $user['to_date'] ?></td>
                            <td><?php echo $user['leave_status'] ?></td>
                            <!--<td> <button type="button" class="btn btn-primary btn-sm px-3" data-bs-toggle="modal"
                         data-bs-target="#editBtn">Edit</button></td>-->

                            <td>

                                <a href="addupdate.php?upd1='<?php echo $user['user_id']; ?>'"
                                    class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                        <?php
}
}
?>


                    </tbody>
                </table>
            </div>
        </div>
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
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

</html>