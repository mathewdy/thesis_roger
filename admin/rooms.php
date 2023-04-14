<?php
include('../connection.php');
ob_start();
session_start();
if(empty($_SESSION['email'])){
    echo "<script>window.location.href='login.php'</script>";
}

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
            <div class="col-md-8 grid-margin streach-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="col-md-12 col-xl-12 ">
                            <!---view image of rooms--->
                            <div class="table-responsive">
                                <table id="data" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Options</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $sql_view = "SELECT * FROM room_category";
                                            $run_view = mysqli_query($conn,$sql_view);

                                            if(mysqli_num_rows($run_view) > 0){
                                                foreach($run_view as $row){
                                                    //gawa na ako ajax dito
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <img src="<?php echo "rooms/" . $row['image']?>" alt="room image" style="border-radius: 0px;" width="100px" height="100px">
                                                            </td>
                                                            <td>
                                                                <?php echo $row['category']?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['price']?>
                                                            </td>
                                                            <td>
                                                                <a data-id="<?= $row ['id']; ?>" class="rooms" href="#" data-toggle='modal' data-target='#roomModal'>Edit</a>
                                                                <a href="delete-room.php?id=<?php echo $row['id'] ?>">Delete</a>
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
                </div>
            </div>
            <div class="col-md-4 grid-margin streach-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="col-md-12">
                            <form class="pt-3" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="category" id="exampleInputEmail1" placeholder="Category">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="price" id="exampleInputEmail1" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" id="exampleInputPassword1" placeholder="Image">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btn" name="add_room" value="SAVE">
                                </div>
                            </form>
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


  <!-- Modal -->
  <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header" style="border:none;">
            <button type="button" class="close bg-white" data-dismiss="modal" aria-label="Close"> 
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="content"></div>
        </div>
        </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="../src/plugins/template/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
  <script src="../src/plugins/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../src/plugins/template/js/dashboard.js"></script>
  <script src="../src/plugins/template/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script>
    $(document).ready(function () {
      $('#data').DataTable();
    });
  </script>
  <script>
    $(document).ready(function(){
        $('.rooms').click(function(){
            var rooms = $(this).data('id');
            $.ajax({
                url: 'rooms_modal.php',
                type: 'post',
                data: {rooms: rooms},
                success: function(response){
                    $('.content').html(response);
                    $('#roomModal').modal('show');
                }
            });
        });
    });
</script>
</body>

</html>

<?php
if(isset($_POST['add_room'])){
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];


    $allowed_extension = array('gif', 'png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'GIF');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)) {
        echo "file not added";
        exit();
    }else{
        $query = "INSERT INTO room_category (category,price,image) VALUES ('$category','$price','$image')";
        $run = mysqli_query($conn,$query);
        move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/" . $_FILES["image"]["name"]);
        if($run){
            echo "<script>window.location.href='rooms.php' </script>";
        }else{
            echo "error" . $conn->error;
        }

    }
}





ob_end_flush();
?>