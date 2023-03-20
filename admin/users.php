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
    <title>Document</title>
</head>
<body>
    <a href="home.php">Home</a>
    <!--data table din to-->

    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Modify</th>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM users";
            $run = mysqli_query($conn,$sql);

            if(mysqli_num_rows($run) > 0){
                foreach($run as $row){
                    ?>


                        <tr>
                            <td>#</td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['password']?></td>
                            <td>
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