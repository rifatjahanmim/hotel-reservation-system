<?php include "header.php"?>
<?php include "sidebar.php"?>
                              
      <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 offset-3">
                    <div class="type-box">
								<div class="box ">
									<div class="box-header with-border">
										<h4 class="box-title">Add Room Catagory</h4>
										<p class="box-description">Choose Your Room Catagory</p>
									</div>
									<div class="box-body">
										<form action="submit_cat.php" method="post">
											<div class="form-group">
												<label for="cat_name">Name</label>
												<input type="text" name="cat_name" placeholder="Enter Catagories" id="cat_name" class="form-control">
											</div>
											<input  class="btn btn-primary" type="submit" name="register" value="Submit">
										
										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div>                   
<?php include "footer.php"?>