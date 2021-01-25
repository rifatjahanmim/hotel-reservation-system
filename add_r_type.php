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
                    <div class="type-box ">
								<div class="box bsize ">
									<div class="box-header with-border">
										<h4 class="box-title">Add Room Type</h4>
										
									</div>
									<div class="box-body">
										<form action="submit_type.php" method="post">
											<div class="form-group">
												<label for="room_type_name">Name</label>
												<input type="text" name="room_type_name" placeholder="Enter name" id="room_type_name" class="form-control">
												<?php
													if (isset($errors['room_type_name'])) {
														echo '<span class="text-danger">'.$errors['room_type_name'].'</span>';
													}
												?>
											</div>
											<input  class="btn btn-primary" type="submit" name="add-type" value="Submit">
										
										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div>                   
<?php include "footer.php"?>