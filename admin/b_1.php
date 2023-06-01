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
    <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>"> 
    <label for="">Enter the amount:</label>
    <input type="number" name="payment" class="form-control amount">
    <p class="p-0 m-0 text-secondary"><small>Amount to pay: <?= $new_price; ?></small></p>
    <input type="submit" class="btn btn-success" name="checked_in" value="Check In">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>

<?php 

}