
<?php

include('../connection.php');
ob_start();
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HBMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../src/plugins/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../src/plugins/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="shortcut icon" href="../src/plugins/template/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="index.php">HBMS</a>
            <a class="navbar-brand brand-logo-mini" href="index.php">HBMS</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="room.php">
                    Rooms
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-800" href="about.php">
                    About
                </a>
            </li>
            </ul>
        </div>
        </nav>
        <div class="main-panel w-100">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
            <div class="col-lg-7 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h2 class="text-center">Book a room.</h2>
                <h6 class="font-weight-light text-center">Select the date of your choice to find an available room.</h6>
                <form class="pt-3" action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="">Check In</label>
                        <input class="form-control check_in" type="text" name="check_in" id="check_in">
                    </div>
                    <div class="form-group">
                        <label for="">Check Out</label>
                        <input class="form-control check_out" type="text" name="check_out" id="check_out">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn search" type="button">Search</button>
                        <!-- <input type="submit" name="search" data-toggle="modal" data-target="#staticBackdrop" class="" value="Search"> -->
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    </div>
                    <!-- <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
                    </div> -->
                </form>
                <script src="../src/js/datepicker.init.js"></script>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="rooms">

                </div>
            </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../src/plugins/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../src/plugins/template/js/off-canvas.js"></script>
<script src="../src/plugins/template/js/hoverable-collapse.js"></script>
<script src="../src/plugins/template/js/template/.js"></script>
<script src="src/plugins/template/js/settings.js"></script>
  <script src="src/plugins/template/js/todolist.js"></script>
<!-- endinject -->
<script>
    $(document).ready(function(){
        // $('.search').click(function(){
        //     var checkIn = $('.check_in').val();
        //     var checkOut = $('.check_out').val();
        //     $.ajax({
        //         url: 'rooms.php',
        //         type: 'get',
        //         data: {c_in: checkIn, c_out: checkOut},
        //         success: function(response){
        //             $('.rooms').html(response);
        //         }
        //     });
        // });
    });
</script>
</body>

</html>





<?php


ob_end_flush();
?>