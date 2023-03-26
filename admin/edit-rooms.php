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
    <a href="rooms.php">Back</a>

    <?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM room_category WHERE id = '$id'";
        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run) > 0){
            foreach($run as $row){
                ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Name</label>
                    <input type="text" name="category" value="<?php echo $row['category']?>">
                    <label for="">Price</label>
                    <input type="text" name="price" value="<?php echo $row['price'] ?>">
                    <label for="">Image</label>
                    <img src="<?php echo "rooms/" . $row['image'] ?>" alt="room image" width="100px" height="100px">
                    <input type="file" name="image">
                    <input type="hidden" name="old_image" value="<?php echo $row['image']?>">
                    <input type="submit" name="update_room" value="Update">
                    </form>
                <?php
            }
        }
    }

    ?>
</body>
</html>

<?php

if(isset($_POST['update_room'])){
    $id = $_GET['id'];
    $category = $_POST['category'];
    $price = $_POST['price'];


    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ''){
        $update_filename = $_FILES['image']['name'];
    }else{
        $update_filename = $old_image;
    }

    if(empty($new_image)){
        $query_update = "UPDATE room_category SET category = '$category', price = '$price'  WHERE id = '$id' ";
        $run_update = mysqli_query($conn,$query_update);

        if($run_update){
            move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/".$_FILES["image"]["name"]);
            echo "<script>alert('Room Updated!') </script>";
            echo "<script>window.location.href='rooms.php' </script>";
            // echo "<script>window.location.href='Units.php' </script>";
        }else{
            echo "error" . $conn->error;
        }
    }

    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='rooms.php' </script>";
    }else{
        
        $query_update = "UPDATE room_category SET category = '$category', price = '$price' , image= '$update_filename' WHERE id = '$id' ";
        $run_update = mysqli_query($conn,$query_update);

        if($run_update){
            move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/".$_FILES["image"]["name"]);
            unlink("rooms/". $old_image);
            echo "<script>alert('Room Updated!') </script>";
            echo "<script>window.location.href='rooms.php' </script>";
            // echo "<script>window.location.href='Units.php' </script>";
        }else{
            echo "error" . $conn->error;
        }
        
    }
    
    
}



ob_end_flush();
?>