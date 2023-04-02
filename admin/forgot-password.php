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

    try {
        //Server settings
       
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dilgccc-report@dilg-reportsystem.online';                     //SMTP username
        $mail->Password   = 'mathewPOGI!@#123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('dilgccc-report@dilg-reportsystem.online', 'HBMS');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>
        Here is your OTP : $otp
        </span>";


        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}


$error = NULL;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <a href="login.php">Cancel</a>
    <form action="" method="POST">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Email">
        <input type="submit" name="next" value="Next">
    </form>
</body>
</html>

<?php
if(isset($_POST['next'])){
    $email = $_POST['email'];
    $otp = rand('0000', '9999');
    sendMail($email,$otp);
    header("Location: otp.php");
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
}

ob_end_flush();

?>