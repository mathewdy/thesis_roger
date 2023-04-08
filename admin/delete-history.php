<?php

include('../connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM history WHERE id = '$id'";
    $run = mysqli_query($conn,$sql);

    if($run){
        echo "<script>window.location.href='history.php' </script>";
    }else{
        echo "error" . $conn->error;
    }
}


?>