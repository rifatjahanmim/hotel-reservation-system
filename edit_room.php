<?php include "header.php";

 include "sidebar.php";
 if(isset($_SESSION['predata'])){
     $predata=$_SESSION['predata'];
     unset($_SESSION['predata']);

 }

 if (isset($_SESSION['errors'])) {
   $errors = $_SESSION['errors'];
   unset($_SESSION['errors']);
}
if(isset($_GET["room_id"])){

$id=$_GET["room_id"];
$sql="SELECT *FROM tb_room WHERE room_id='$id'";
$run=$conn->query($sql);
if($run->num_rows > 0){
    $room=$run->fetch_assoc(); 
    ?>
 

<div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 offset-3">
                    <div class="type-box">
								<div class="box bup">
									<div class="box-header with-border">
										<h4 class="box-title ">Updte Room</h4>
										<p class="box-description">Choose the best room type</p>
									</div>
									<div class="box-body">
										<form action="delete_room.php?room_id=<?php echo $room["room_id"]?>" method="post">

                                        <div class="form-group">
												<label for="room_name">Room Name</label>
                                                <?php
                                                if(isset($predata)){?>
                                                 <input type="text" name="room_name" value="<?php echo $predata["room_name"]?>" id="room_name" class="form-control">
                                              <?php  }else{?>
                                                <input type="text" name="room_name" value="<?php echo $room["room_name"]?>" id="room_name" class="form-control">
                                            <?php
                                              }
											?>	
                                                <?php
													if (isset($errors['room_name'])) {
														echo '<span class="text-danger">'.$errors['room_name'].'</span>';
													}
												?>
											</div>

											<div class="form-group">
												<label for="cat_name">Choose a Category</label>
                                                <select name="cat_id" id="cat_name" class="form-control">
                                                <option value=""><?php echo "Select a Category"?></option>
                                                <?php
                                                   $sql="SELECT *FROM tb_categories";
                                                    $run=$conn->query($sql);
                                                    if($run->num_rows>0){
                                                        while($show=$run->fetch_assoc()){?>
                                             
                                                 
                                                 
                                                <option value="<?php echo $show["cat_id"]?>"<?php
                                                if(isset($predata)){
                                                    if($predata["cat_id"]==$show["cat_id"]){
                                                        echo "selected";
                                                    }    

                                                } else{
                                                    if($room["cat_id"]==$show["cat_id"]){
                                                        echo "selected";
                                                    }    

                                                }
                                                
                                                
                                                
                                                ?>>
                                                
                                                
                                                
                                                
                                                <?php echo $show["cat_name"]?></option>
                                            
                                                <?php
                                                        }
                                                    }
                                               
                                                ?>
                                                </select>
                                                <?php
													if (isset($errors['cat_id'])) {
														echo '<span class="text-danger">'.$errors['cat_id'].'</span>';
													}
												?>


											</div>
									


											<div class="form-group">
												<label for="room_type_name">Choose Room Type</label>
                                                <select name="room_type_id" id="room_type_name" class="form-control">
                                                <option value=""><?php echo "Select Room Type"?></option>
                                                <?php
                                                   $sql="SELECT *FROM tb_room_type";
                                                    $run=$conn->query($sql);
                                                    if($run->num_rows>0){
                                                        while($show=$run->fetch_assoc()){?>
                                                          <option value="<?php echo $show["room_type_id"]?>"<?php   
                                                           if(isset($predata)){
                                                                  if($predata["room_type_id"]==$show["room_type_id"]){
                                                                     echo "selected";
                                                    }    

                                                } else{
                                                    if($room["room_type_id"]==$show["room_type_id"]){
                                                        echo "selected";
                                                    }    

                                                }
                                                ?>>
                                                 <?php echo $show["room_type_name"]?></option>
                                                </option>
                                                
                                                       
                                                 
                                                <?php
                                                        }
                                                    }
                                               
                                                ?>
                                                </select>
                                                <?php
													if (isset($errors['room_type_id'])) {
														echo '<span class="text-danger">'.$errors['room_type_id'].'</span>';
													}
												?>
											</div>

                                            <div class="form-group">

												<label for="facility_name">Choose facilities</label>
                                                <br>
                                                <?php
                                                   $sql="SELECT *FROM facilities";
                                                    $run=$conn->query($sql);
                                                    if($run->num_rows>0){
                                                        while($show=$run->fetch_assoc()){?>
                                                <input type="checkbox" id="facility_name" name="facilities[]" value="<?php echo $show["facility_name"]?>"
                                                <?php 
                                                           if(isset($predata['facilities'])){

                                                           if(in_array($show["facility_name"],$predata['facilities'])){
                                                               echo "checked";
                                              }    

                                          } else{
                                             $fac = json_decode($room['facilities']);
                                             if(in_array($show["facility_name"],$fac)){
                                                echo "checked";
                                              }    

                                          }
                                                    ?>>
                                                <label for="facility_name"><?php echo $show["facility_name"]?></label>

                                                <?php
                                                        }
                                                    }
                                                    ?>
                                                <?php
													if (isset($errors['facilities'])) {
														echo '<br><span class="text-danger">'.$errors['facilities'].'</span>';
													}
												?>

                                               
                                            
                                                
											</div>
                                            <div class="form-group">
											<label for="details">Room detail</label>
                                            <?php
                                                if(isset($predata)){?>
                                                 <input type="text" name="details" value="<?php echo $predata["details"]?>" id="details" class="form-control">
                                              <?php  }else{?>
                                                <input type="text" name="details" value="<?php echo $room["details"]?>" id="details" class="form-control">
                                            <?php
                                              }
											?>

                                                <?php
													if (isset($errors['details'])) {
														echo '<span class="text-danger">'.$errors['details'].'</span>';
													}
												?>
											</div>
                                            <div class="form-group">
												<label for="price">Room price</label>
                                                <?php
                                                if(isset($predata)){?>
                                                 <input type="text" name="price" value="<?php echo $predata["price"]?>" id="price" class="form-control">
                                              <?php  }else{?>
                                                <input type="text" name="price" value="<?php echo $room["price"]?>" id="price" class="form-control">
                                            <?php
                                              }
											?>	
                                                <?php
													if (isset($errors['price'])) {
														echo '<span class="text-danger">'.$errors['price'].'</span>';
													}
												?>
											</div>
									
											
											<input  class="btn btn-primary" type="submit" name="update-room" value="Submit">
 <?php
}
}

?>
										   



										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div> 

<?php include "footer.php"?>