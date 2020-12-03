<?php include "header.php";
$id=$_GET["room_type_id"];
$sql="SELECT *FROM tb_room_type WHERE room_type_id='$id'";
$run=$conn->query($sql);
if($run->num_rows > 0){
    $show=$run->fetch_assoc(); ?>
}



<?php include "sidebar.php"?>

<div class="container">
           <div class="row">
               <div class="col-lg-6 offset-3 ">
                   <div class="form-name text-center ">
                      <h1> Update Room type </h1>
                   </div>
                
                      <form action="delete_type.php?room_type_id=<?php echo $show["room_type_id"]?>" method="post">

                          
                      
                          <label for="room_type_name">Room Type Name</label>
                          <input class="form-group form-control" type="text" name="room_type_name" id="room_type_name" value="<?php echo $show['room_type_name'] ?>">
                         

                          <input  class="btn btn-primary" type="submit" name="update_type" value="UPDATE">
 <?php }
?>
                          
                      </form>
               </div>
           </div>
       </div>

<?php include "footer.php"?>