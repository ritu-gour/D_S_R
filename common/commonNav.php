<style>
  .img {
    border-radius: 50%;
    width: 30px;
    height: 30px;
  }
  nav{
    display: flex;
    justify-content: space-between;
  }
</style>



<div id="particles-js"></div>

<nav class=" navbar-expand-lg navbar-dark bg-dark sticky-top">

  <div class="container-fluid">
    <!-- <img src="logo.png"/> -->
    <?php include '../common/SideNav.php' ?>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">



      </ul>

    </div>
  </div>
  

</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../apply//js/sweet.js"></script>
<?php

if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {

?>
  <script>
    swal({
      title: "<?php echo $_SESSION['status']; ?>",
      text: "You clicked the button!",
      icon: "<?php echo $_SESSION['status_code']; ?>",
      button: "Ok Done",
    });
  </script>
<?php
  unset($_SESSION['status']);
}


