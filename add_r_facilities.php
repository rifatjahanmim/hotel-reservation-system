<?php include "header.php"?>
<?php include "sidebar.php"?>
                              
      <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 offset-3">
                    <div class="type-box">
								<div class="box ">
									<div class="box-header with-border">
										<h4 class="box-title">Add Room Facilities</h4>
										<p class="box-description">Choose Your Room Facilities</p>
									</div>
									<div class="box-body">
										<form action="submit_fac.php" method="post">
											<div class="form-group">
												<label for="facilities_name">Name</label>
												<input type="text" name="facilities_name" placeholder="Enter facilities" id="facilities_name" class="form-control">
											</div>
											<input  class="btn btn-primary" type="submit" name="add_facilities" value="Submit">
										
										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div>                   
<?php include "footer.php"?>