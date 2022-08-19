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
//include '../config/dbcon.php';

?>
<?php
require("../config/dbcon.php");

if (isset($_POST['submit'])) {

    $emp_id = $_POST['emp_id'];
    $message = $_POST['message'];
    $date = $_POST['date'];
   


    $query = "INSERT INTO `tbl_message`(`emp_id`, `message`, `date`) VALUES ('$emp_id','$message','$date')";
    $fire = mysqli_query($con, $query) or die("con not insert the data." . mysqli_error($con));

    if ($fire) { ?> <script>
alert("data submit to database");
</script>
<?php

    } else {


    ?>

<script>
alert('Not submit');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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


   

    <div class="container my-5">
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-6 col-lg-4 mt-4 shadow rounded  bg-light my-4" id="">
                <form action="#" method="POST">
                    <h3 class="text-center ">Message </h3>
                    
                
                            <div class="mb-3">
                        <label for="emp_id" class="form-label">Emp_id | firstname lastname</label>
                        <?php
                        $query = "SELECT * FROM tbl_registration";
                        $fire = mysqli_query($con, $query);
                        ?>
                        <select name="emp_id" id="emp_id" class="form-select" aria-label="Default select example">
                            <option selected>Emp_id | firstname lastname</option>

                            <?php
                            if (mysqli_num_rows($fire) > 0) {
                                while ($user = mysqli_fetch_assoc($fire)) { ?>
                               

                                    <option value="<?php echo $user['emp_id'] ?>" ><?php echo $user['emp_id'] ?> | <?php echo $user['firstname']?> <?php echo $user['lastname'] ?></option>
                                   
                                   <!--<input  type="hidden" name="emp_id" value="<?php echo $user['emp_id'] ?>">-->
                                    
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                           
                        </select>
                        <div class="mb-3 my-3">
                            <label for="message" class="form-label">Massage</label>
                            <input type="text" class="form-control" id="" name="message"
                                placeholder="Enter your Msg">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id=""
                                placeholder="Date">
                        </div>
                        
                           
                        <button type="submit" name="submit" class="btn btn-primary mb-4" >Submit</button>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
    </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>