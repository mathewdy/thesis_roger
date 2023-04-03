<?php
include '../connection.php';

$id = $_POST['rooms'];
$sql = "SELECT * FROM room_category WHERE id = '$id'";
$run = mysqli_query($conn,$sql);
if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
        ?>

            <form action="" method="POST" enctype="multipart/form-data">
            <img src="<?php echo "rooms/" . $row['image'] ?>" class="card-img-top mb-2" alt="room image" width="100px" height="250px">
            <label for="">Name</label>
            <input type="text" class="form-control form-control-md mb-2" name="category" value="<?php echo $row['category']?>">
            <label for="">Price</label>
            <input type="text" class="form-control form-control-md mb-2" name="price" value="<?php echo $row['price'] ?>">
            <label for="">Image</label>
            <input type="file" class="w-100 mb-2" name="image">
            <input type="hidden" name="old_image" value="<?php echo $row['image']?>">
            <input type="submit" name="update_room" class="btn btn-primary" value="Update">
            </form>
        <?php
    }
}
?>


