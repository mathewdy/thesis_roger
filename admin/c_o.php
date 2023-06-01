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
        <span id="logo" class="d-none" style="margin-bottom: 50px;display: flex; justify-content: space-between; align-items:center;">
        <span style="width: 20%;">
        <img src="image.jpg" alt="" style="height: 100px;">

        </span>
        <span style="width: 80%;">
        <h2>Hotel De Luna</h2>
        <h5>8010 Anonas, Sta. Mesa, Maynila, Kalakhang Maynila, Philippines</h5>
        </span>
        </span>
        <label for="">Reference Number:</label>
        <input type="text" class="form-control" name="reference_number" value="<?php echo $row['reference_number']?>"   readonly>
        <br>

        <label for="">Room ID:</label>
        <input type="text" class="form-control" name="room_id" value="<?php echo $row['room_id']?>"  readonly>
        <br>
        <label for="">Customer Name:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>"  readonly>
        <br>

        <!-- <input type="text" class="form-control" name="room_category_id" value="<?php echo $row['room_category_id']?>"  readonly> -->
        <label for="">Contact Number:</label>
        <input type="text" class="form-control" name="contact_number" value="<?php echo $row['contact_number']?>" readonly>
        <br>

        <label for="">Check In Date:</label>
        <input type="text" class="form-control" name="date_in" value="<?php echo $row['date_in']?>" readonly>
        <br>

        <label for="">Check Out Date:</label>
        <input type="text" class="form-control" name="date_out" value="<?php echo $row['date_out']?>" readonly>
        <br>

        <label for="">Amount Paid:</label>
        <input type="text" class="form-control" name="payment" value="<?php echo $row['payment']?>" readonly>
        <br>

        <span class="d-flex justify-content-end align-items center mt-4 buttons">
        <input type="submit" class="btn btn-success" name="check_out" value="Check Out">
        <button class="btn btn-primary print">Print Invoice</button>
        </span>
        
    </div>
    
</form>
<script>
  $('.print').on('click', function(){
    var print = $('.cont').html()
    var mywindow = window.open('http://localhost/thesis_roger/admin/history.php', 'print', 'height=400,width=600');
    mywindow.document.write('<html><head><link href="../src/plugins/template/css/vertical-layout-light/style.csss" rel="stylesheet">');
    mywindow.document.write('</head>');
    mywindow.document.write('<style>.buttons{display: none;} input[type=text]{border: none;}</style>');
    mywindow.document.write('<body>');
    // mywindow.document.write('<h1> Hotel De Luna</h1>');

    mywindow.document.write(print);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
  })
</script>
<?php 

}