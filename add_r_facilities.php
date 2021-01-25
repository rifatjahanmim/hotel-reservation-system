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
								<div class="box bsize ">
									<div class="box-header with-border">
										<h4 class="box-title">Add Room Facilities</h4>
										
									</div>
									<div class="box-body">
										<form action="submit_fac.php" method="post">
											<div class="form-group">
												<label for="facility_name">Name</label>
												<input type="text" name="facility_name" placeholder="Enter facilities" id="facility_name" class="form-control">
												<?php
													if (isset($errors['facility_name'])) {
														echo '<span class="text-danger">'.$errors['facility_name'].'</span>';
													}
												?>
											</div>
											<input  class="btn btn-primary" type="submit" name="add_facilities" value="Submit">
											</div>
										
										</form>
									</div>
								</div>
							</div>
        </div>
      </div>                      
      </div>                   
<?php include "footer.php"?>