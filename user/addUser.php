<?php
session_start();
if (isset($_SESSION['emp_id'])) {
} else {
 // header("location: ../index.php"); // for two folders
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
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = md5($_POST['password']);
  $status = $_POST['status'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  // $image = $_FILES['image']['tmp_name'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $joining_date = $_POST['joining_date'];
  $role = $_POST['role'];

  $query = "INSERT INTO  `tbl_registration`(`emp_id`, `firstname`, `lastname`, `dob`, `email`, `mobile`, `password`, `status`, `gender`, `image`, `address`, `joining_date`, `role`)
    VALUES('$emp_id','$firstname','$lastname', '$dob', '$email', '$mobile', '$password', '$status', '$gender', '$image', '$address', '$joining_date', '$role' )";

  $fire = mysqli_query($con, $query) or die("con not insert the data." . mysqli_error($con));

  if ($fire) {
    // alert("data submitted to database");
    $_SESSION['status'] = "User Registered SuccessFully";
    $_SESSION['status_code'] = "success";
    header('location:View_User.php');
  } else {
    $_SESSION['status'] = "User Registered SuccessFully";
    $_SESSION['status_code'] = "error";
    header('location:addUser.php');
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Add font awesome icons -->

  <style>
    #particles-js {

      height: 40%;
      position: fixed;
      z-index: -10;
      top: 0;
      left: 0
    }

    #container {

      position: absolute;
      padding: 1rem 2rem;
      z-index: 100;
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

    #footer {
      width: 100%;
      background-color: #DCDCDC;
      height: 17vh;
      display: flex;
      text-align: center;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-around;
    }

    #fIcons {
      display: flex;
      flex-wrap: nowrap;
    }

    .icon {
      color: blue;
      margin: 0 1rem;
      height: 2rem;
      width: 3rem;
    }
  </style>
</head>

<body>

  <?php include '../common/sidenav.php' ?>
  
  <div class="">
    <nav class="navbar navbar-expand-sm shadow bg-light  navbar-light ">
      <ul class="navbar-nav ">
        <li class="nav-item active " class="breadcrumb-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">

        </li>
        <div class="d-flex flex-row  ">
          <li class="nav-item my-4" style="margin-left:50px;">
            <?php
            if ($_SESSION['role'] == 'ADMIN') {
            ?>
          <li class="breadcrumb-item my-2"><a href="#">Add New</a></li>
        <?php
            }
        ?>

        <li class="breadcrumb-item my-2  " style="color:black;"><a style="color:black;" href="view_user.php">View</a></li>
        </li>
        </div>
      </ul>
    </nav>
    <div id="">
      <div id="" class="container "></div>
      <div class="container  ">
        <div class="row justify-content-center ">
          <div class="col-12 col-sm- col-md-8  shadow rounded mt-5 mb-5 bg-light">
            <h4 class="text-center">Employee Details</h4>
            <hr class="bg-danger" />

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="" method="POST" enctype="multipart/form-data" id="addUser-form">
              <div class="row g-1 ">
                <div class="col-6">
                  <label for="fName" class="form-label">First Name</label>
                  <input name="firstname" type="text" class="form-control" placeholder="Enter Your First Name" id="fName">
                </div>
                <div class="col-6">
                  <label for="lName" class="form-label">Last Name</label>
                  <input name="lastname" type="text" class="form-control" placeholder="Enter Your Last Name" id="lName">
                </div>
                <div class="row g-1 ">
                  <div class="col-6">
                    <div class="">
                      <label for="empId" class="form-label"> Employee Id</label>
                      <input name="emp_id" type="text" class="form-control" placeholder="Enter Your Employee Id" id="empId">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="">
                      <label for="email" class="form-label">Email</label>
                      <input name="email" type="email" class="form-control" id="email" placeholder="Enter Your Email">
                    </div>
                  </div>
                </div>
                <div class="row g-1 ">
                  <div class="col-6">
                    <div class="">
                      <label for="dob" class="form-label">Enter Your Dob</label>
                      <input name="dob" type="date" class="form-control" id="dob">

                    </div>
                  </div>
                  <div class="col-6">
                    <div class="">
                      <label for="mNumber" class="form-label">Mobile No.</label>
                      <input name="mobile" type="text" class="form-control" placeholder="enter Your Mobile No." id="mNumber">
                    </div>
                  </div>
                </div>
                <div class="row  g-1  ">
                  <div class="col-4 my-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                      <option selected>Status</option>
                      <option value="ACTIVE">Active</option>
                      <option value="DISABLE">Disable</option>
                    </select>
                  </div>
                  <div class="col-4 my-4">
                    <div class=" ">
                      <label for="gender" class="form-label">Gender</label>
                      <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected>Gender</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4 my-4">
                    <div class=" ">
                      <label for="role" class="form-label">Role</label>
                      <select name="role" class="form-select" aria-label="Default select example">
                        <option selected>Role</option>
                        <option value="PROJECT MANAGER">Project Manager</option>
                        <option value="PROJECT LEAD">Project Lead</option>
                        <option value="DEVELOPER">Developer</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="OTHER">Other</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row g-1 ">
                  <div class="col-4">
                    <label for="pass" class="form-label">Project Image</label>
                    <input name="image" type="file" class="form-control" placeholder="browse" id="image">
                  </div>
                  <div class="col-4">
                    <label for="joinDate" class="form-label">Joining Date</label>
                    <input name="joining_date" type="date" class="form-control" id="joinDate">
                  </div>
                  <div class="col-4">
                    <label for="pass" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter Your password" id="pass">
                  </div>
                </div>
              </div>
              <div class="row g-1">
                <div class="col-12">
                  <label for="address" class="form-label mx-2">Address</label>
                  <textarea name="address" class="form-control" id="address" placeholder="Enter Your Address" rows="3"></textarea>
                </div>
              </div>
              <div class="row g-1">
                <div class="col-12">
                  <div class="d-grid  my-2">
                    <button name="submit" type="submit" class="btn btn-primary " id="submit">Submit</button>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between mb-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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