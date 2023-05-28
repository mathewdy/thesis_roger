<?php
include('../connection.php');
session_start();
ob_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Document</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../src/plugins/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../src/plugins/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="../src/plugins/template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../src/plugins/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="home.php">HBMS</a>
        <a class="navbar-brand brand-logo-mini" href="home.php">HBMS</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <?php echo $_SESSION['email'];?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booked.php">
              <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">Booked</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="check-in.php">
              <i class="mdi mdi-briefcase-check menu-icon"></i>
              <span class="menu-title">Check In</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="check-out.php">
              <i class="mdi mdi-book-minus menu-icon"></i>
              <span class="menu-title">Check Out</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rooms.php">
              <i class="mdi mdi-home-modern menu-icon"></i>
              <span class="menu-title">Room Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">
              <i class="mdi mdi-history menu-icon"></i>
              <span class="menu-title">History</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-12 grid-margin streach-card">
                <div class="card position-relative">
                    <div class="card-header" style="background: none;">
                      <span>
                        <button class="btn btn-sm btn-success print">Generate</button>
                        <!-- <select name="" id="">
                          <option value=""></option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="">July</option>
                          <option value="">August</option>
                          <option value="">September</option>
                          <option value="">October</option>
                          <option value="">November</option>
                          <option value="">December</option> -->

                        </select>
                      </span>

                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive d-table">
                                <span id="logo" class="d-none" style="margin-bottom: 50px;display: flex; justify-content: space-between; align-items:center;">
                                  <span style="width: 20%;">
                                  <img src="image.jpg" alt="" style="height: 100px;">

                                  </span>
                                  <span style="width: 80%;">
                                  <h2>Hotel De Luna</h2>
                                  <h5>8010 Anonas, Sta. Mesa, Maynila, Kalakhang Maynila, Philippines</h5>
                                  </span>
                                </span>
                                <table id="data" class="display expandable-table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Room ID</th>
                                            <th>Contact Number</th>
                                            <th>Price</th>
                                            <th>Date In</th>
                                            <th>Date Out</th>
                                            <th class="option">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = "SELECT history.id, history.reference_number, history.room_id, history.name, history.room_category_id, history.contact_number, history.date_in, history.date_out, history.date_created, room_category.id, room_category.price FROM history LEFT JOIN room_category On history.room_category_id = room_category.id";
                                        $run = mysqli_query($conn,$sql);

                                        if(mysqli_num_rows($run) > 0){
                                            $count = 0;
                                            foreach($run as $row){
                                                $count++;
                                                ?>


                                                    <tr>
                                                        <td><?php echo $count?></td>
                                                        <td><?php echo $row['name']?></td>
                                                        <td><?php echo $row['room_id']?></td>
                                                        <td><?php echo $row['contact_number']?></td>
                                                        <td><?php echo $row['price']?></td>
                                                        <td><?php echo $row['date_in']?></td>
                                                        <td><?php echo $row['date_out']?></td>
                                                        <td class="option"><a href="delete-history.php?id=<?php echo $row['id']?>">Delete</a></td>
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
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../src/plugins/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../src/plugins/template/vendors/chart.js/Chart.min.js"></script>
  <script src="../src/plugins/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../src/plugins/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../src/plugins/template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../src/plugins/template/js/off-canvas.js"></script>
  <script src="../src/plugins/template/js/hoverable-collapse.js"></script>
  <script src="../src/plugins/template/js/template.js"></script>
  <script src="../src/plugins/template/js/settings.js"></script>
  <script src="../../skydash/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../src/plugins/template/js/dashboard.js"></script>
  <script src="../src/plugins/template/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>
<script>
  $('#data').DataTable();
</script>
<script>
  $('.print').on('click', function(){
    var print = $('.d-table').html()
    var mywindow = window.open('http://localhost/thesis_roger/admin/history.php', 'print', 'height=400,width=600');
    mywindow.document.write('<html><head><link href="../src/plugins/template/css/vertical-layout-light/style.csss" rel="stylesheet">');
    mywindow.document.write('</head>');
    mywindow.document.write('<style>.option{display: none;} .pagination{display: none;}.dataTables_filter{display:none;}.dataTables_length{display:none;} .dataTables_info{display:none;}</style>');
    mywindow.document.write('<body>');
    // mywindow.document.write('<h1> Hotel De Luna</h1>');
    mywindow.document.write(print);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
  })
</script>
</html>


<?php
ob_end_flush();
?>