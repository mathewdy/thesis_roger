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
    

    <h2>History</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Room ID</th>
                <th>Contact Number</th>
                <th>Date In</th>
                <th>Date Out</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $sql = "SELECT * FROM history";
                $run = mysqli_query($conn,$sql);

                if(mysqli_num_rows($run) > 0){
                    $count = 0;
                    foreach($run as $row){
                        $count++;
                        ?>


                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['room_id']?></td>
                                <td><?php echo $row['contact_number']?></td>
                                <td><?php echo $row['date_in']?></td>
                                <td><?php echo $row['date_out']?></td>
                                <td><a href="delete-history.php?id=<?php echo $row['id']?>">Delete</a></td>
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