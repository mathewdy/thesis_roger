<?php
include('../connection.php');
ob_start();
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='login.php'</script>";
}

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
    <a href="booked.php">Booked</a>
    <a href="check-in.php">Check In</a>
    <a href="check-out.php">Check Out</a>
    <a href="rooms.php">Room Category</a>
    <a href="users.php">Users</a>
</body>
</html>

<?php

ob_end_flush();

?>