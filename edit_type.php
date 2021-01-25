<?php include "header.php";
 include "sidebar.php";
 
 if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
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
                   <div class="form-name ">
                        <div class="type-box">
							<div class="box ub">
								<div class="box-header with-border">
                                <h4 class="box-title text-center">Update Room Type</h4>
                   
                
                      <form action="delete_type.php?room_type_id=<?php echo $show["room_type_id"]?>" method="post">

                          
                      
                          <label for="room_type_name">Room Type Name</label>
                          <?php if(!isset($_SESSION["predata"])){?>
                          <input class="form-group form-control" type="text" name="room_type_name" id="room_type_name" value="<?php echo $show['room_type_name'] ?>">
                          <?php
                        }else {?>
                        <input class="form-group form-control" type="text" name="room_type_name" id="room_type_name" value="<?php echo $_SESSION["predata"] ?>">
                        <?php
                       unset($_SESSION["predata"]) ;}
                        ?>
                         <?php
                               if (isset($errors['room_type_name'])) {
                               echo '<span class="text-danger">'.$errors['room_type_name'].'</span>';
                               }

                         ?>
                         <div>
                          <input  class="btn btn-primary" type="submit" name="update_type" value="UPDATE">
                         </div>

 <?php }
?>
                          
                      </form>
                          </div>
                       </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

<?php include "footer.php"?>