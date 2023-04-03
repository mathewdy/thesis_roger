<?php
include '../connection.php';

$id = $_POST['users'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$run = mysqli_query($conn,$sql);
if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
        ?>

        <form action="" method="POST">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control form-control-md mb-2" value="<?php echo $row['name']?>"required>
        <label for="">Email</label>
        <input type="text" name="email" class="form-control form-control-md mb-2" value="<?php echo $row['email']?>" required> 
        <label for="">Password</label>
        <input type="password" name="password" class="form-control form-control-md mb-2" required>
        <input type="submit" name="update" class="btn btn-sm btn-primary" value="Save">
        </form>
        <?php
    }
}
?>


