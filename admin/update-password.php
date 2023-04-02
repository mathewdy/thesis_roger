<?php

include('../connection.php');
session_start();
ob_start();
echo $_SESSION['email'];

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
        <input type="password"  name="password1" >
        <input type="password" name="password2" >
        <input type="submit" name="update" value="Update">
    </form>

</body>
</html>


<?php
if(isset($_POST['update'])){
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_SESSION['email'];

    if($password1 != $password2){
        echo "Password doesn't match";
    }else{
        //update

        $sql = "UPDATE users SET password = '$password1' WHERE email = '$email'";
        $run = mysqli_query($conn,$sql);

        if($run){
            echo "<script>window.location.href='login.php' </script>";
        }else{
            echo "error" . $conn->error;
        }
    }
}

ob_end_flush();
?>