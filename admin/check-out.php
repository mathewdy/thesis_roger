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
            <div class="col-md-12 grid-margin streach-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-lg-6 mb-3">
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="data" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th scope="col">Reference #</th>
                                                <th scope="col">Room ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Contact Number</th>
                                                <th>Room Category</th>
                                                <th>Price</th>
                                                <th>Modify</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        //SELECT booked.id, booked.reference_number, booked.room_id, booked.name, booked.contact_number, booked.room_category_id, booked.date_created, booked.date_out, booked.date_in, room_category.id, room_category.price FROM booked LEFT JOIN room_category ON booked.room_category_id = room_category.id

                                            $sql = "SELECT * FROM booked  WHERE status = '2'";
                                            $run = mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($run) > 0){
                                                $count = 0;
                                                foreach($run as $row){
                                                    $count++;
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $count?></td>
                                                            <td><?php echo $row['reference_number']?></td>
                                                            <td><?php echo $row['room_id']?></td>
                                                            <td><?php echo $row['name']?></td>
                                                            <td><?php echo $row['contact_number']?></td>
                                                            <td>
                                                                <?php

                                                                    if($row['room_category_id'] == '1'){
                                                                        echo "Family Room";
                                                                    }elseif($row['room_category_id'] == '2'){
                                                                        echo "Deluxe Room";
                                                                    }elseif($row['room_category_id'] == '3'){
                                                                        echo "Single Room";
                                                                    }else{
                                                                        echo "Twin Room";
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row['price'];?></td>
                                                            <td>
                                                                <!--dapat kapag pinindot na to, as CHECK OUT NA-->
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>" >
                                                                    <input type="hidden" name="room_id" value="<?php echo $row['room_id']?>" >
                                                                    <input type="hidden" name="name" value="<?php echo $row['name']?>" >
                                                                    <input type="hidden" name="room_category_id" value="<?php echo $row['room_category_id']?>" >
                                                                    <input type="hidden" name="contact_number" value="<?php echo $row['contact_number']?>">
                                                                    <input type="hidden" name="date_in" value="<?php echo $row['date_in']?>">
                                                                    <input type="hidden" name="date_out" value="<?php echo $row['date_out']?>">
                                                                    <input type="submit" name="check_out" value="Check Out">
                                                                </form>
                                                                <a href="delete-check-out.php?id=<?php echo $row['id']?>">Delete</a>
                                                            </td>
                                                        </tr>

                                                    <?php
                                                }
                                            }

                                            ?>
                                    </table>    
                                </div>
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
</body>

</html>

<?php
if(isset($_POST['check_out'])){

    date_default_timezone_set("Asia/Manila");
    $date = date('y-m-d');
    //gagawa ako ng query para auto insert sa history after ng comeplete details
    $check = 2;
    $reference_number = $_POST['reference_number'];
    $room_id = $_POST['room_id'];
    $name = $_POST['name'];
    $room_category_id = $_POST['room_category_id'];
    $contact_number = $_POST['contact_number'];
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];
    $update = "UPDATE booked SET status = '$check' WHERE reference_number = '$reference_number' ";
    $run_update = mysqli_query($conn,$update);



    if($run_update){
        //query verification 
        $sql_check = "SELECT * FROM history WHERE reference_number = '$reference_number' ";
        $run_check = mysqli_query($conn,$sql_check);

        if(mysqli_num_rows($run_check) > 0){
          echo "<script>alert('Already added') </script>";
        }else{
           //gagawa na ako ng insert sa history

        $insert_history_query = "INSERT INTO history (reference_number,room_id,room_category_id,name,contact_number,date_in,date_out,date_created) VALUES('$reference_number', '$room_id', '$room_category_id','$name','$contact_number', '$date_in', '$date_out', '$date') ";
        $run_history = mysqli_query($conn,$insert_history_query);
        echo "<script>window.location.href='history.php' </script>";
        
        }

       
        
    }else{
        echo "error" . $conn->error;
    }
}

if(isset($_POST['filter'])){

    ?>
    <table class="table">
    <!---fetch data------>

        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Reference #</th>
                <th scope="col">Room ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th>Room Category</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $sql = "SELECT * FROM booked WHERE status = '2' AND room_category_id = '$filter'";
                $run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($run) > 0){
                    $count = 0;
                    foreach($run as $row){
                        $count++;
                        ?>

                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['reference_number']?></td>
                                <td><?php echo $row['room_id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['contact_number']?></td>
                                <td>
                                    <?php

                                        if($row['room_category_id'] == '1'){
                                            echo "Family Room";
                                        }elseif($row['room_category_id'] == '2'){
                                            echo "Deluxe Room";
                                        }elseif($row['room_category_id'] == '3'){
                                            echo "Single Room";
                                        }else{
                                            echo "Twin Room";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>" >
                                        <input type="submit" name="check_in" value="Check Out">
                                    </form>
                                    <a href="delete-check-out.php">Delete</a>
                                </td>
                            </tr>

                        <?php
                    }
                }

            ?>
        </tbody>
    </table> 
    
    <?php
}

ob_end_flush();
?>