
<?php

include('../connection.php');
ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <title>Document</title>
</head>
<body>
    <!----so gagawa ako ng insert dito-- s
    pero ,dapat ma fetch ko muna lahat ng room sidto, and selected dates-->

<form action="" method="POST" autocomplete="off">
   
    <label for="">Check In</label>
    <input class="form-control" type="text" name="check_in" id="check_in">
    <label for="">Check Out</label>
    <input class="form-control" type="text" name="check_out" id="check_out">
    <input type="submit" name="search" value="Search">
 
</form>

<script>
var check_in = $('#check_in');
var check_out = $('#check_out');

check_in.datepicker({
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: 'yyyy-mm-dd',
    startDate: new Date()
});
check_out.datepicker({
    keyboardNavigation: false,
    forceParse: false,
    format: 'yyyy-mm-dd',
    autoclose: true,
});
check_in.on("changeDate", function(e) {
    check_out.datepicker('setStartDate', e.date);
    check_out.prop('disabled', false);
});
    </script>
</body>
</html>




<?php
if(isset($_POST['search'])){
    //fetch ko muna yung mga rooms
    //kunin ko muna yung difference ng days
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $query_room = "SELECT * FROM room_category";
    $run_room = mysqli_query($conn,$query_room);

    if(mysqli_num_rows($run_room) > 0){
        foreach($run_room as $row){
            ?>

                <!---modal--->
                <form action="fill-out.php" method="POST">

                <label for="">Name</label>
                <input type="text" name="full_name">
                <label for="">Contact Number</label>
                <input type="text" name="contact_number">

                <label for="">Image</label>
                <br>    
                <img src="<?php echo "../admin/rooms/" . $row['image']?>" alt="room" width="100px" height="100px">
                <br>
                <label for="">Name</label>
                <input type="hidden" name="category" value="<?php echo $row['category']?>">
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <p><?php echo $row['category']. " " . "room"?></p>
                <br>
                <label for="">Price</label>
                <input type="hidden" name="price" value="<?php echo $row['price']?>">
                <p><?php echo $row['price']?></p>
                <br>
                <input type="submit" name="next" value="Next">
                <br>
                <input type="hidden" name="check_in" value="<?php echo $check_in?>">
                <input type="hidden" name="check_out" value="<?php echo $check_out?>">
                </form>
            <?php
        }
    }
}


ob_end_flush();
?>