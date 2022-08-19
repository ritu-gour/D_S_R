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
?>


<?php require("../config/dbcon.php");

if ((isset($_GET['del']))) {
    $user_id = $_GET['del'];
    $query = "DELETE FROM tbl_dsr where user_id='$user_id'";
    $fire = mysqli_query($con, $query) or die("can not data." . mysqli_error($con));
    if ($fire) { ?> <script>
alert("data Delete to database");
</script>
<?php

    } else {
    ?>
<script>
alert('Not deleted');
</script>
<?php
    }
}
?>

<?php

if (isset($_POST['btnsubmit'])) {

    $valuesearch = $_POST['valuesearch'];
    //$query ="SELECT * FROM `tbl_reg` WHERE CONCAT(`name`, `mobile`, `password`)LIKE '%".valuesearch."%'";
    $query = "SELECT * FROM `tbl_dsr` WHERE CONCAT(`user_id`)LIKE '%" . $valuesearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `tbl_dsr`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "daily_status_report");
    $filter_result = mysqli_query($con, $query);
    return $filter_result;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boostrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- js and jquery  -->

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- external css  -->
  <link rel="stylesheet" href="../css/sidenav.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <title> MicroTechnologies</title>
    
    <style>
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

    <!-- navbar  -->
    <?php include '../common/sidenav.php' ?>
    
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
                <li class="breadcrumb-item my-2"><a href="#">View</a></li>
               
                </li>
            </div>
        </ul>
    </nav>


    <div class="container my-3  shadow rounded mt-5 mb-5 bg-light">
        <form action="#" method="POST">
            <div class="table-responsive">
                <h3 class="text-center" style="font-size: 22px;"></h3>
                <hr class="bg-danger">
                <br />
                <table class="table table-hover" id="datatable">
                   

                    <thead style="background-color:black ;" border="1" cellpadding="3" cellspacing="3">
                        <tr style="color:white;">

                            <th>user id</th>
                            <th>Project id</th>
                            <th>Submission date</th>
                            <th>Dsr of date</th>
                            <th>Time taken</th>
                            <th>Dsr text</th>
                            <?php
                            if ($_SESSION['role'] == 'ADMIN') { ?>
                            <th>Delete</th>
                            <?php } ?>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        //if ($_SESSION['role'] == 'ADMIN') {
                            $query = "SELECT * FROM tbl_dsr ";
                            $fire = mysqli_query($con, $query);
                            if (mysqli_num_rows($fire) > 0) {
                        while ($user = mysqli_fetch_array($fire)){?>
                        <tr>
                            <td><?php echo $user['user_id'] ?></td>
                            <td><?php echo $user['project_id'] ?></td>
                            <td><?php echo $user['dsr_submission_date'] ?></td>
                            <td><?php echo $user['dsr_of_date'] ?></td>
                            <td><?php echo $user['time_taken'] ?></td>
                            <td><?php echo $user['dsr_text'] ?></td>
                            <?php if ($_SESSION['role'] == 'ADMIN') { ?>

                            <td>
                                <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $user['user_id'] ?>"
                                    class="btn btn-sm btn-danger">Delete</a>
                                <?php  } ?>
                                <!-- <td>
                                        <a href="submitupdate.php?upd1=<?php echo $user['user_id'] ?>" class="btn btn-sm btn-warning">Update</a>
                                    </td>-->
                            <!--<td>
                                <a href="updatesubmit.php?upd1=<?php echo $user['user_id'] ?>"
                                    class="btn btn-sm btn-warning">Update</a>
                            </td>-->
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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
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