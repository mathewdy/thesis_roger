<?php
session_start();
include('../connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "DELETE FROM booked WHERE id = '$id'";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo "<script>window.location.href='booked.php' </script>";
    }else{
        echo "error" . $conn->error;
    }
}


?>