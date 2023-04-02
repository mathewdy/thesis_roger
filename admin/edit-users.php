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

<a href="users.php">Back</a>

    <?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $run = mysqli_query($conn,$sql);
            if(mysqli_num_rows($run) > 0){
                foreach($run as $row){
                    ?>
                        <form action="" method="POST">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']?>"required>
                        <label for="">Email</label>
                        <input type="text" name="email" value="<?php echo $row['email']?>" required> 
                        <label for="">Password</label>
                        <input type="password" name="password" required>
                        <input type="submit" name="update" value="Save">
                        </form>

                    <?php

                }
            }
        }
    ?>
    
</body>
</html>


<?php

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_GET['id'];
    $sql_update = "UPDATE users SET name = '$name' , email='$email' , password= '$password' WHERE id = '$id'";
    $run_update = mysqli_query($conn,$sql_update);

    if($run_update){
        echo "<script>window.location='users.php' </script>";
    }else{
        echo "error" . $conn->error;
    }
}

ob_end_flush();

?>