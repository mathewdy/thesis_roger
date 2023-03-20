<?php

include('../connection.php');
session_start();
ob_start();


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
        <input type="text" name="username">
        <input type="password" name="password"> 
        <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>

<?php
if(isset($_POST[''])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}


ob_end_flush();
?>