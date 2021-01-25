<?php include "header.php";
  include "sidebar.php";
  if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
?>

<div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 offset-3">
                    <div class="type-box">
								<div class="box rsize">
									<div class="box-header with-border">
										<h4 class="box-title ">Add Room</h4>
									
									</div>
									<div class="box-body">
										<form action="submit_room.php" method="post">


                                        <div class="form-group">
												<label for="room_name">Room Name</label>
                                                <input type="text" name="room_name" placeholder="Enter Room Nmae" id="room_name" class="form-control">	
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
                                                 
                                                <option value="<?php echo $show["cat_id"]?>"><?php echo $show["cat_name"]?></option>
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
                                                          <option value="<?php echo $show["room_type_id"]?>"><?php echo $show["room_type_name"]?></option>
                                                
                                                       
                                                 
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

                                                <input type="checkbox" id="facility_name" name="facilities[]" value="<?php echo $show["facility_name"]?>">
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
												<input type="text" name="details" placeholder="Enter Room Details" id="details" class="form-control">
                                                <?php
													if (isset($errors['details'])) {
														echo '<span class="text-danger">'.$errors['details'].'</span>';
													}
												?>
                                                
											</div>
                                            <div class="form-group">
												<label for="price">Room price</label>
												<input type="text" name="price" placeholder="Enter price" id="price" class="form-control">
                                                <?php
													if (isset($errors['price'])) {
														echo '<span class="text-danger">'.$errors['price'].'</span>';
													}
												?>
                                                
											</div>
									
											
											<input  class="btn btn-primary" type="submit" name="add-room" value="Submit">
										   



										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div> 

<?php include "footer.php"?>