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
										<h4 class="box-title">Add Room Catagory</h4>
										
									</div>
									<div class="box-body">
										<form action="submit_cat.php" method="post">
											<div class="form-group">
												<label for="cat_name">Category Name</label>
												<input type="text" name="cat_name" placeholder="Enter Catagories" id="cat_name" class="form-control">
												<?php
													if (isset($errors['cat_name'])) {
														echo '<span class="text-danger">'.$errors['cat_name'].'</span>';
													}
												?>
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