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

    <!-----mamaya gagawa din ako ng add users dito---->

    <form action="" method="POST">
        <input type="text" name="name">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" name="add_user" value="Save">
    </form>
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
                $count = 0;
                foreach($run as $row){
                    $count++;
                    ?>


                        <tr>
                            <td><?php echo $count?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['password']?></td>
                            <td>
                                <a href="edit-users.php?id=<?php echo $row['id']?>">Edit</a>
                                <a href="delete-users.php?id=<?php echo $row['id']?>">Delete</a>
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

if(isset($_POST['add_user'])){

    date_default_timezone_set("Asia/Manila");
    $date = date('y-m-d');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_insert = "INSERT INTO users (name,username,password,date_created)
    VALUES ('$name','$username', '$password', '$date')";
    $run_insert = mysqli_query($conn,$sql_insert);

    if($run_insert){
        echo "<script>window.location.href='users.php' </script>";
    }else{
        echo "error" . $conn->error;
    }
}

ob_end_flush();

?>