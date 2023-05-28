<?php
include('../connection.php');
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$otp){
    require ("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

    $mail = new PHPMailer(true);
    $err = '';

    try {
        //Server settings
       
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jijieazy13@gmail.com';                     //SMTP username
        $mail->Password   = 'kxaeexkrxhyhypat';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('jijieazy13@gmail.com', 'HBMS');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>
        Here is your OTP : $otp
        </span>";


        $mail->send();

        // echo "<script>alert('SUCCESS')</script>";
        $err = 'An Error has occured!';

        return true;
    } catch (Exception $e) {
        return false;
        $err = 'An Error has occured!';

        // echo "<script>alert('ERROR')</script>";

    }
    
}
if(isset($_POST['next'])){
  $email = $_POST['email'];
  $otp = rand('0000', '9999');
  $err = '';
  if(sendMail($email, $otp)){
    header("Location: otp.php");
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
  }else{
    // echo "<script>alert('An error has occured')</script>";
    $err = 'An Error has occured!';
  }
  // sendMail($email,$otp);
 
}


$error = NULL;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HBMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../src/plugins/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../src/plugins/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../src/plugins/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../src/plugins/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4 class="text-center h3">Forgot Password</h4>
              <h6 class="font-weight-light text-center">Enter Your Email to proceed.</h6>
              <form class="pt-3" action="" method="POST">
              <?php 
                if(isset($err) && $err != ''){
                  ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $err; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                }
                ?>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control form-control-lg" name="email" placeholder="Email">
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="next" value="Next">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <!-- <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label> -->
                  </div>
                  <a href="login.php" class="auth-link text-black w-100 text-center">Log In</a>
                </div>
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
  <script src="../src/plugins/template/js/template.js"></script>
  <script src="../src/plugins/template/js/settings.js"></script>
  <script src="../src/plugins/template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

<?php


ob_end_flush();

?>