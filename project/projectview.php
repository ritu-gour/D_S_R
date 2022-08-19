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
if ((isset($_GET['del']))) {
  $Project_ID = $_GET['del'];
  $query = "DELETE FROM tbl_project where Project_ID='$Project_ID' ";
  $fire = mysqli_query($con, $query) or die("can not data." . mysqli_error($con));
  if ($fire) { ?> <script>
      alert("data Delet to database");
    </script>
  <?php

  } else {
  ?>

    <script>
      alert('Not delete');
    </script>

<?php
  }
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- external css  -->
  <link rel="stylesheet" href="../css/sidenav.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

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
        <li class="breadcrumb-item my-2"><a href="addproject.php" style="color:black;">Add New</a></li>

      <?php
          }
      ?>

      <li class="breadcrumb-item my-2"><a href="#">View</a></li>
      <?php
      if ($_SESSION['role'] == 'ADMIN') {
      ?>

        <!---<li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>-->
        <li class="breadcrumb-item my-2"><a href="assingto.php" style="color:black;">Assign To</a></li>

      <?php
      }
      ?>
      <?php
            if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'DEVELOPER') {
            ?>

                <!--<li class="breadcrumb-item my-2"><a href="updatepro.php">Update</a></li>-->
                <li class="breadcrumb-item my-2"><a href="assignview.php">Assign View</a></li>

                <?php
            }
            ?>
      </li>
      </div>
    </ul>
  </nav>


  <div class="container my-5 shadow rounded mt-5 mb-5 bg-light">
    <div class="table-responsive">

      <div class="table-responsive">

        <h3 class="text-center mt-4 " style="font-size: 22px; "></h3>
        <hr>
        <table class="table table-hover my-3 py-3" id="datatable">
          <thead style="background-color:black ;" border="1" cellpadding="5" cellspacing="5">
            <tr style="color:white;">

              <th>Projectname</th>
              <th>Technology</th>
              <th>Duration</th>
              <th>Initilizedate</th>
              <th>Client</th>
              <th>Status</th>
              <th>Client contact </th>
              <th>Completed date</th>
              <?php
              if ($_SESSION['role'] == 'ADMIN') {
              ?>
                <th>Delete</th>
                <th>Update</th>

              <?php
              }
              ?>

            </tr>
          </thead>
          <tbody>

            <?php
            if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'DEVELOPER') {
              $query = "SELECT * FROM tbl_project";
            } else {
              $id = $_SESSION['emp_id'];

              $query = "select * from tbl_project as tp, tbl_project_assign_team   as tpat where tp.Project_ID = tpat.Project_ID and tpat.user_id ='$id'";
              //$query= "SELECT * from tbl_project,tbl_project_assign_team where tbl_project_assign_team.Project_ID AND tbl_project.user_id";

            }
            $fire = mysqli_query($con, $query);
            if (mysqli_num_rows($fire) > 0) {
              while ($user = mysqli_fetch_assoc($fire)) { ?>
                <tr>
                  <td><?php echo $user['projectname'] ?></td>
                  <td><?php echo $user['projecttechno'] ?></td>
                  <td><?php echo $user['duration'] ?></td>
                  <td><?php echo $user['initilizedate'] ?></td>
                  <td><?php echo $user['projectclient'] ?></td>
                  <td><?php echo $user['prostatus'] ?></td>
                  <td><?php echo $user['proclincon'] ?></td>
                  <td><?php echo $user['compledate'] ?></td>
                  <?php
                  if ($_SESSION['role'] == 'ADMIN') {
                  ?>
                    <td>
                      <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $user['Project_ID'] ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    <td>
                      <a href="updatepro.php?upd1=<?php echo $user['Project_ID'] ?>" class="btn btn-sm btn-warning">Update</a>
                    </td>
                  <?php
                  }
                  ?>
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