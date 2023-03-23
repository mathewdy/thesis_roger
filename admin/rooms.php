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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="category">
    <input type="text" name="price">
    <input type="file" name="image" id="">
    <input type="submit" name="add_room" value="Save">
</form>

<!---view image of rooms--->

<table>
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Options</th>
    </thead>
    <tbody>
        <?php

            $sql_view = "SELECT * FROM room_category";
            $run_view = mysqli_query($conn,$sql_view);

            if(mysqli_num_rows($run_view) > 0){
                foreach($run_view as $row){
                    //gawa na ako ajax dito
                    ?>

                        <tr>
                            <td>
                                <img src="<?php echo "rooms/" . $row['image']?>" alt="room image" width="100px" height="100px">
                            </td>
                            <td>
                                <?php echo $row['category']?>
                            </td>
                            <td>
                                <?php echo $row['price']?>
                            </td>
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

<?php
if(isset($_POST['add_room'])){
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];


    $allowed_extension = array('gif', 'png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'GIF');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)) {
        echo "file not added";
        exit();
    }else{
        $query = "INSERT INTO room_category (category,price,image) VALUES ('$category','$price','$image')";
        $run = mysqli_query($conn,$query);
        move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/" . $_FILES["image"]["name"]);
        if($run){
            echo "<script>window.location.href='rooms.php' </script>";
        }else{
            echo "error" . $conn->error;
        }

    }
}





ob_end_flush();
?>