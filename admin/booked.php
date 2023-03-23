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
    <!---use data table, fetch natin lahat ng naka book--->
    <a href="home.php">Back</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th scope="col">Reference #</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Number</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT * FROM booked";
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
                                        <!---kapag pinindot yung UPDATE-->
                                        <!---it's either profile OR another button to checked in--->
                                        <form action="" method="POST">
                                            <input type="hidden" name="reference_number" value="<?php echo $row['reference_number']?>"> 
                                            <input type="submit" name="checked_in" value="Check In">
                                        </form>
                                        <a href="delete-booked.php?id=<?php echo $row['id']?>">Delete</a>
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

if(isset($_POST['checked_in'])){
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