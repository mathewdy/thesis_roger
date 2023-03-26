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
    
<form action="" method="POST">
    <select name="room" id="">

        <?php

        $sql_filter = "SELECT * FROM room_category";
        $run_filter = mysqli_query($conn,$sql_filter);

        if(mysqli_num_rows($run_filter) > 0){
            foreach($run_filter as $row_filter){
                ?>
                    <!---gagawa ako filter--->
                
                        <option value="<?php echo $row_filter['id']?>"><?php echo ucfirst($row_filter['category']) . " " . "Room"?></option>
                <?php
            }
        }

        ?>
    </select>
        <input type="submit" name="filter" value="Filter">
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

                $sql = "SELECT * FROM booked WHERE status = '1'";
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


if(isset($_POST['filter'])){
    echo $filter = $_POST['room'];

    ?>
    <table class="table">
    <!---fetch data------>

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

                $sql = "SELECT * FROM booked WHERE status = '1' AND room_category_id = '$filter'";
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
    
    <?php
}

ob_end_flush();
?>