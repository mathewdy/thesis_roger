<?php
include "../connection.php";
    
    $id = $_POST['id'];
    $check_in = $_POST['f_in'];
    $check_out = $_POST['f_out'];   
    $category = $_POST['category'];
    $price = $_POST['price'];
?>

    <form action="process.php" method="POST"  name="fill_out">
    <label for="">Name</label>
    <input type="text" class="form-control" name="full_name" pattern="[a-zA-Z\s]+" title="Use letters only" minlength="9" maxlength="34" required>
    <br>
    <label for="">Contact Number</label>
    <input type="tel" name="contact_number" class="form-control" size="20" minlength="9" maxlength="13" pattern="[0-9]{10}" placeholder="915XXXXXXX" title="Numbers only" required>
    <br>
    <label for="">Email Address</label>
    <input type="email" class="form-control" name="email"  required>
   
    <br>
   


    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="hidden" name="check_in" value="<?php echo $check_in?>">
    <input type="hidden" name="check_out" value="<?php echo $check_out?>">
    <input type="hidden" name="category" value="<?php echo $category?>">
    <input type="hidden" name="price" value="<?php echo $price?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add_book" value="Book">
    </div>
    </form>



<?php


?>

