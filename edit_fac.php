<?php include "header.php";
 include "sidebar.php";
 
 if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}

$id=$_GET["facility_id"];
$sql="SELECT *FROM facilities WHERE facility_id='$id'";
$run=$conn->query($sql);
if($run->num_rows >0){
    $show=$run->fetch_assoc(); ?>




<div class="container">
           <div class="row">
               <div class="col-lg-6 offset-3 ">
                   <div class="form-name  ">
                       <div class="type-box">
							<div class="box ub">
								<div class="box-header with-border">
										<h4 class="box-title text-center">Update Room facilities</h4>
                    
                
                
                      <form action="delete_fac.php?facility_id=<?php echo $show["facility_id"]?>" method="post">

                          
                      
                          <label for="facility_name">Facilities Name</label>
                          <?php if(!isset($_SESSION["predata"])){?>
                          <input class="form-group form-control" type="text" name="facility_name" id="facility_name" value="<?php echo $show['facility_name'] ?>">
                          <?php
                        }else {?>
                            <input class="form-group form-control" type="text" name="facility_name" id="facility_name" value="<?php echo $_SESSION["predata"] ?>">
                       
                       <?php
                       unset($_SESSION["predata"]) ;}
                    ?>

                          <?php
                               if (isset($errors['facility_name'])) {
                               echo '<span class="text-danger">'.$errors['facility_name'].'</span>';
                               }

                         ?>
                         <div>
                          <input  class="btn btn-primary" type="submit" name="update_fac" value="UPDATE">
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