<?php 
include './config/dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />

    <link rel="stylesheet">
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
            font-weight: bold;
        }

        #img {
            background: url('gt.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #form {
            margin: 4rem 0;
            padding: 1.5rem;
        }

        #form h1 {
            text-align: center;
            font-size: 2rem;
            margin: 1rem 1rem;
        }

        #form input {
            border-radius: 6px;
        }
    </style>
</head>

<body class="bg-light">

    <!-- navbar  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./start/logo.png" alt="" style="margin-right: 10px;" width="40px" height="40px"><b style="font-size: larger; ">MicroTechnologies</b>
            </a>
            <ul class="navbar-nav me-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- main  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-4 shadow rounded mt-5 mb-5 bg-light">
                <br>
                <h3 class="text-center" style="color: black;" class="">Login</h3>
                <hr class="bg-danger" />
                <form action="./start/loginprosess.php" method="POST">
                    <div class="form-group">
                        <label for="mob">Email</label>
                        <input type="text" class="form-control" id="mob" aria-describedby="mobhelp" name="email" required />
                        <small id="mobhelp" class="form-text text-muted">More Secured</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required />
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <button type="submit" name="submit" class="btn btn-success">Login</button>
                        </div>
                </form>
                <br>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>


    <div class="footer">
        <!-- Footer  -->
        <div class="container-fluid text-dark" style="background-color: #DCDCDC;">
            <div class="row">
                <div class="col-sm-8 mt-3 mb-3">
                    <p class="text-center">Copyright &#169; 2021 Micro Technologies All Right Reserved</p>
                </div>
                <div class="col-sm-4   mt-3 mb-3">
                    <div class="d-flex justify-content-around">
                        <div class="instagram"> <a href="#"><i class="fa fa-github" style='font-size:35px;color: black'>&nbsp; </i></a></div>

                        <div class="face"><a href="#"><i class="fa fa-facebook-official" style='font-size:35px;color:black '>&nbsp; </i></a></div>
                        <div><a href="#"><i class="fa fa-linkedin-square" style="font-size:35px;color:black">&nbsp;</i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- js  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>