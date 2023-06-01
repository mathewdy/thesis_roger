<?php 
include('../connection.php');

$data = $_POST['data'];

$sql = "SELECT * FROM booked WHERE reference_number = '$data'";
$q = mysqli_query($conn, $sql);
foreach($q as $row){
    $check_in = $row['date_in'];
    $check_out = $row['date_out'];
    $date_in = DateTime::createFromFormat('Y-m-d', $check_in);
    $date_out = DateTime::createFromFormat('Y-m-d', $check_out);
    $interval = $date_out->diff($date_in);
    $days = $interval->format('%a');

    $new_price = $row['price'] * $days;
?>
<form action="" method="POST">
    <div class="cont">
        <label for="">Reference Number:</label>
        <input type="text" class="form-control" name="reference_number" value="<?php echo $row['reference_number']?>"   readonly>
        <label for="">Room ID:</label>
        <input type="text" class="form-control" name="room_id" value="<?php echo $row['room_id']?>"  readonly>
        <label for="">Customer Name:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>"  readonly>
        <!-- <input type="text" class="form-control" name="room_category_id" value="<?php echo $row['room_category_id']?>"  readonly> -->
        <label for="">Contact Number:</label>
        <input type="text" class="form-control" name="contact_number" value="<?php echo $row['contact_number']?>" readonly>
        <label for="">Check In Date:</label>
        <input type="text" class="form-control" name="date_in" value="<?php echo $row['date_in']?>" readonly>
        <label for="">Check Out Date:</label>
        <input type="text" class="form-control" name="date_out" value="<?php echo $row['date_out']?>" readonly>
        <label for="">Amount Paid:</label>
        <input type="text" class="form-control" name="payment" value="<?php echo $row['payment']?>" readonly>
        <input type="submit" name="check_out" value="Check Out">
    </div>
    
</form>

<?php 

}