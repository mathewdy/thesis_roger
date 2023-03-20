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
                        foreach($run as $row){
                            ?>

                                <tr>
                                    <td>#</td>
                                    <td><?php echo $row['reference_number']?></td>
                                    <td><?php echo $row['room_id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['contact_number']?></td>
                                    <td>
                                        <!---kapag pinindot yung UPDATE-->
                                        <!---it's either profile OR another button to checked in--->
                                        <a href="">Edit</a>
                                        <a href="">Delete</a>
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

ob_end_flush();
?>