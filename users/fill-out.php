<?php
include('../connection.php');
session_start();
ob_start();

if(isset($_POST['next'])){

    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];

    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];   
    $category = $_POST['category'];
    $price = $_POST['price'];

    $reference_number = rand('0000', '9999');
    $room_id = "Room" . rand('00','99');

    $sql_insert = "INSERT INTO booked (reference_number,room_id,name,contact_number,date_in,date_out,status,date_created,date_updated) VALUES ('$reference_number','$room_id','$full_name', '$contact_number', '$check_in','$check_out', '3', '$date' , '$date')";
    $run_insert = mysqli_query($conn,$sql_insert);
    
    if($run_insert){
        echo "added";
        //pero pakita muna sa kanya yung details ng book nya ulet
        //redirect dapat sya sa book.php
    }else{
        echo "error" . $conn->error;
    }



  
 

}
ob_end_flush();


?>

