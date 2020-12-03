<?php include "header.php"?>
<?php include "sidebar.php"?>
                              
      <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 offset-3">
                    <div class="type-box">
								<div class="box ">
									<div class="box-header with-border">
										<h4 class="box-title">Add Room Type</h4>
										<p class="box-description">Choose the best room type</p>
									</div>
									<div class="box-body">
										<form action="submit_type.php" method="post">
											<div class="form-group">
												<label for="room_type_name">Name</label>
												<input type="text" name="room_type_name" placeholder="Enter name" id="room_type_name" class="form-control">
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