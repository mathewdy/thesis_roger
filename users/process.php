<?php
include('../connection.php');
session_start();
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$check_in,$check_out,$full_name){
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
        $mail->Subject = 'Confirmation Booking';
        $mail->Body    = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>
        <h3>Good day Mr / Ms : </h3>
        <p>$full_name</p>
        <br>
        Check In: $check_in
        <br>
        Check Out: $check_out
        <br>
        Amout to pay: $price

        <strong>Note: If you didn't pay 30 minutes ahead of time , your reservation will be disregarded </strong>

        </span>";


        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}


$error = NULL;

if(isset($_POST['add_book'])){
    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $full_name = $_POST['full_name'];
    $contact_number =  "+63" . $_POST['contact_number'];
    $email = $_POST['email'];

    
    $id = $_POST['id'];

    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];   
    $category = $_POST['category'];
    $price = $_POST['price'];





    $reference_number = rand('0000', '9999');
    $room_id = "Room" . rand('00','99');

    $sql_insert = "INSERT INTO booked (reference_number,room_id,room_category_id,name,contact_number,email,date_in,date_out,status,date_created,date_updated) VALUES ('$reference_number','$room_id','$id','$full_name', '$contact_number','$email', '$check_in','$check_out', '3', '$date' , '$date')";
    $run_insert = mysqli_query($conn,$sql_insert);
    
    if($run_insert){
        echo "<script>alert('Thank you for booking')</script>";
        echo "<script>window.location.href='book.php'</script>";
        sendMail($full_name,$check_in,$check_out,$email,$price);
        //pero pakita muna sa kanya yung details ng book nya ulet
        //redirect dapat sya sa book.php
        //gagawa na lang akong email confirmation

   
    }else{
        echo "error" . $conn->error;
    }
}
