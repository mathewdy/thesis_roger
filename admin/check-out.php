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
    
    <!---gagawa ako filter--->
    <form action="" method="POST">
        <select name="" id="">
            <option value="">All</option>
            <option value="">Deluxe Room</option>
            <option value="">Family Room</option>
            <option value="">Single Room</option>
            <option value="">Twin Bed Room</option>

        </select>
    </form>

    <!---fetch data------>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Reference #</th>
                <th scope="col">Room ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th>Room Category</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $sql = "SELECT * FROM booked WHERE id = '2'";
                $run = mysqli_query($conn,$sql);
                if(mysqli_num_rows($run) > 0){
                    $count = 0;
                    foreach($run as $row){
                        $count++;
                        ?>

                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['reference_number']?></td>
                                <td><?php echo $row['room_id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['contact_number']?></td>
                                <td>
                                    <?php

                                        if($row['room_category_id'] == '1'){
                                            echo "Family Room";
                                        }elseif($row['room_category_id'] == '2'){
                                            echo "Deluxe Room";
                                        }elseif($row['room_category_id'] == '3'){
                                            echo "Single Room";
                                        }else{
                                            echo "Twin Room";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <!--dapat kapag pinindot na to, as CHECK OUT NA-->
                                    <form action="" method="POST">
                                        <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>" >
                                        <input type="hidden" name="room_id" value="<?php echo $row['room_id']?>" >
                                        <input type="hidden" name="name" value="<?php echo $row['name']?>" >
                                        <input type="hidden" name="room_category_id" value="<?php echo $row['room_category_id']?>" >
                                        <input type="hidden" name="contact_number" value="<?php echo $row['contact_number']?>">
                                        <input type="hidden" name="date_in" value="<?php echo $row['date_in']?>">
                                        <input type="hidden" name="date_out" value="<?php echo $row['date_out']?>">
                                        <input type="submit" name="check_out" value="Check Out">
                                    </form>
                                    <a href="delete-check-out.php?id=<?php echo $row['id']?>">Delete</a>
                                </td>
                            </tr>

                        <?php
                    }
                }

            ?>
        </tbody>
    </table>    

</body>
</html>

<?php
if(isset($_POST['check_out'])){

    date_default_timezone_set("Asia/Manila");
    $date = date('y-m-d');
    //gagawa ako ng query para auto insert sa history after ng comeplete details
    $check = 2;
    $reference_number = $_POST['reference_number'];
    $room_id = $_POST['room_id'];
    $name = $_POST['name'];
    $room_category_id = $_POST['room_category_id'];
    $contact_number = $_POST['contact_number'];
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];
    $update = "UPDATE booked SET status = '$check' WHERE reference_number = '$reference_number' ";
    $run_update = mysqli_query($conn,$update);



    if($run_update){
        //gagawa na ako ng insert sa history
        $insert_history_query = "INSERT INTO history (reference_number,room_id,room_category_id,name,contact_number,date_in,date_out,date_created) VALUES('$reference_number', '$room_id', '$room_category_id','$name','$contact_number', '$date_in', '$date_out', '$date') ";
        $run_history = mysqli_query($conn,$insert_history_query);
        echo "<script>window.location.href='check_out.php' </script>";
        
        
    }else{
        echo "error" . $conn->error;
    }
}



ob_end_flush();
?>