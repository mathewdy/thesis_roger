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

                $sql = "SELECT * FROM booked WHERE id = '1'";
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
                                    <form action="" method="POST">
                                        <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>" >
                                        <input type="submit" name="check_in" value="Check Out">
                                    </form>
                                    <a href="delete-check-in.php">Delete</a>
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

    //gagawa ako ng query para auto insert sa history after ng comeplete details
    $check = 1;
    $reference_number = $_POST['reference_number'];
    $update = "UPDATE booked SET status = '$check' WHERE reference_number = '$reference_number' ";
    $run_update = mysqli_query($conn,$update);

    if($run_update){
        echo "<script>window.location.href='check_out.php' </script>";

    }else{
        echo "error" . $conn->error;
    }
}


ob_end_flush();
?>