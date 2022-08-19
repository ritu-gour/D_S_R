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
<?php require("../config/dbcon.php");?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sidenav.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">

    <!-- link local css -->
    <style>
    

    .bg {
        position: absolute;
        z-index: -1;
        width: 100%;
        opacity: 0.8;
        top: 0;
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

    <title>Leave</title>
</head>

<body>
    <?php include '../common/sidenav.php'?>





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

                
                <li class="breadcrumb-item my-2"><a href="viewleave.php" style="color:black;">Pending</a></li>
                <li class="breadcrumb-item my-2"><a href="#">History</a></li>
                <li class="breadcrumb-item my-2" style="margin-left:px;"><a href="../admin/admin.php"style="color:black;">View Leave</a></li>
              
                <?php
            }
            else
            {
            ?>
                <li class="breadcrumb-item my-2"><a href="applyleave.php" style="color:black;">Apply</a></li>
                <li class="breadcrumb-item my-2"><a href="viewleave.php" style="color:black;">Pending</a></li>
                <li class="breadcrumb-item my-2"><a href="#">History</a></li>
                <li class="breadcrumb-item my-2"><a href="../admin/userview.php" style="color:black;">userview</a></li>
                <?php
            }
            
            ?>
                </li>
            </div>
        </ul>
    </nav>



    <img src="" class="bg" alt="">
    <div class="container   my-5 shadow rounded  bg-light" >
       

        <div class="table-responsive">
        <h3 class="text-center" style="font-size: 23px;"></h3>
        <hr>
            <!-- <div class="table-responsive">     -->
            <br />
            <!-- <table class="table table-hover">  -->
            <div class="d-flex flex-row ">
  <div class="p-2 "><b>Minimum date: </b><input type="text" id="min" name="min" >

</div>
  <div class="p-2 "> <b >Maximum date: </b><input  type="text" id="max" name="max"></div>
  
</div>

          <!-- <p><b>Minimum date: </b><input type="text" id="min" name="min" >

                &nbsp;&nbsp;
                <b >Maximum date: </b><input  type="text" id="max" name="max" >
            </p>-->

            <table class="table table-hover" id="datatable" style="background: white;">
                <thead style="background-color:black ;" border="1" cellpadding="5" cellspacing="5">
                    <tr style="color:white; font-weight: bold;">
                        <th scope="col">User id</th>
                        <th scope="col">Leave type</th>
                        <th scope="col">Reason</th>
                        <th scope="col">From date</th>
                        <th scope="col">To date</th>
                        <th scope="col">Applied on</th>
                        <th scope="col">Leave status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                  if($_SESSION['role']=='ADMIN')
                  {
                 $query = "SELECT * FROM tbl_leave";
                  }
                  else
                  {
                      $id=$_SESSION['emp_id'];
                    $query = "SELECT * FROM tbl_leave where user_id='$id' && leave_status='Approved'";
                  }
                $fire = mysqli_query($con,$query);
                if(mysqli_num_rows($fire)>0){
                   while($user = mysqli_fetch_assoc($fire)){?>
                    <tr>
                        <td><?php echo $user['user_id']?></td>
                        <td><?php echo $user['leave_type'] ?></td>
                        <td><?php echo $user['leave_reason'] ?></td>
                        <td><?php echo $user['from_date'] ?></td>
                        <td><?php echo $user['to_date'] ?></td>
                        <td><?php echo $user['applied_on'] ?></td>
                        <td><?php echo $user['leave_status'] ?></td>

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





        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
        <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[4]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table =
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


            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
        </script>

</body>

</html>