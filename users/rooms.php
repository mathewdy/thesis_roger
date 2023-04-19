<?php
include('../connection.php');

$check_in = $_GET['c_in'];
$check_out = $_GET['c_out'];

if(empty($check_in) && empty($check_out)){
    echo "error bawal mag book";
}else{
//fetch ko muna yung mga rooms
//kunin ko muna yung difference ng days
    
    $query_room = "SELECT * FROM room_category";
    $run_room = mysqli_query($conn,$query_room);


?>
        <div class="container p-5">
            <h3 class="text-gray-500">Rooms</h3>
            <hr class="featurette-divider" style="opacity: 1; border: 1.3px solid black;">
<?php
    if(mysqli_num_rows($run_room) > 0){
        foreach($run_room as $row){
            ?>
            <div class="card border border-primary bg-primary text-white p-5 py-2 mb-2" style="border-radius: 8px;">
                <!---modal--->
                <!-- <form action="fill-out.php" method="POST"> -->
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-4 text-center">
                        <img src="<?php echo "../admin/rooms/" . $row['image']?>" alt="room" width="180px" height="180px">
                    </div>
                    <div class="col-lg-5 align-items-center justify-content-center">
                        <label for="" class="h4">Name</label>
                        <input type="hidden" class="category" name="category" value="<?php echo $row['category']?>">
                        <input type="hidden" class="id" name="id" value="<?php echo $row['id']?>">
                        <p class="h5"><?php echo $row['category']. " " . "room"?></p>
                        <br>
                        <label for="" class="h4">Price</label>
                        <input type="hidden" class="price" name="price" value="<?php echo $row['price']?>">
                        <p class="h5"><?php echo $row['price']?></p>
                        <br>
                        <br>
                        <input type="hidden" class="fill_in" name="check_in" value="<?php echo $check_in?>">
                        <input type="hidden" class="fill_out" name="check_out" value="<?php echo $check_out?>">
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" style="float:right;" data-toggle="modal" data-target="#fillOut" class="btn btn-outline-secondary btn-rounded btn-icon fillout" name="next"><i class="text-light mdi mdi-arrow-right"></i></button>
                        <!-- <input type="submit" name="next" value="Next"> -->
                    </div>
                </div> 
                <br>
                
               
                <!-- </form> -->
            </div>
                
              
            <?php
        }
    }
    ?>
                        <hr class="featurette-divider" style="opacity: 1; border: 1.3px solid black;">

    
</div>

<?php
}
?>

<script>
    $(document).ready(function(){
        $('.fillout').click(function(){
            var id = $('.id').val();
            var category = $('.category').val();
            var price = $('.price').val();
            var f_in = $('.fill_in').val();
            var f_out = $('.fill_out').val();
            $.ajax({
                url: 'fill-out.php',
                type: 'post',
                data: {id: id, category: category,price: price,f_in: f_in, f_out: f_out},
                success: function(response){
                    $('.fill-form').html(response);
                    $('#fillOut').modal('show');
                    console.log(response)
                }
            });
        });
    })
</script>
