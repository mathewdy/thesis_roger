<?php

include('../connection.php');
ob_start();
session_start();

$_SESSION['otp'];
$_SESSION['email'];

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
    <form action="" method="POST">
        <input type="number" name="otp">
        <input type="submit" name="next" value="Next">
    </form>
</body>
</html>
<?php

if(isset($_POST['next'])){

    $otp = $_POST['otp'];
    if($_SESSION['otp'] == $otp){
        header('Location: update-password.php');
    }else{
        echo "Error OTP, please check your email" ;
    }

}


ob_end_flush();
?>