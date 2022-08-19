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

  
  <div class="container my-5 shadow rounded  bg-light">


    <h3 class="text-center" style="font-size: 22px;"></h3>
    <hr>

    <div class="table-responsive">
      <table class="table table-hover my-3 py-3" id="datatable">
        <thead style="background-color:black ;">
          <tr style="color:white;">
            
            <th>Msg</th>
            <th>Date</th>
           
          

          </tr>
        </thead>
        <tbody style="background-color: white;">

          <?php


            $query = "SELECT * FROM tbl_message WHERE emp_id='$DEVELOPER'";
         $fire = mysqli_query($con, $query);
          if (mysqli_num_rows($fire) > 0) {
            while ($user = mysqli_fetch_array($fire)) { ?>
              <tr>
               
               
              <td>
                  <?php echo $user['message'] ?>
                </td>
                <td>
                  <?php echo $user['date'] ?>
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
          [10, 25, 50, "date"]
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