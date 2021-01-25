<?php include "header.php";
 include "sidebar.php";  
 
 if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
 
$id=$_GET["cat_id"];
$sql="SELECT *FROM tb_categories WHERE cat_id='$id'";
$run=$conn->query($sql);
if($run->num_rows > 0){
    $show=$run->fetch_assoc(); ?>




<div class="container">
           <div class="row">
               <div class="col-lg-6 offset-3 ">
                   <div class="form-name  ">
                      <div class="type-box">
								<div class="box ub">
									<div class="box-header with-border">
										<h4 class="box-title text-center">Update Room Categories</h4>
                                     
                   
                      <form action="delete_cat.php?cat_id=<?php echo $show["cat_id"]?>" method="post">

                          
                      
                          <label for="cat_name">Categories Name</label>
                          
                          <?php if(!isset($_SESSION["predata"])){?>
                        <input class="form-group form-control" type="text" name="cat_name" id="cat_name" value="<?php echo $show['cat_name'] ?>">
                        <?php
                        }else {?>
                            <input class="form-group form-control" type="text" name="cat_name" id="cat_name" value="<?php echo $_SESSION["predata"] ?>">
                       
                       <?php
                       unset($_SESSION["predata"]) ;}
                    ?>

                          <?php
                               if (isset($errors['cat_name'])) {
                               echo '<span class="text-danger">'.$errors['cat_name'].'</span>';
                               }

                         ?>
                        <div>

                          <input  class="btn btn-primary" type="submit" name="update_cat" value="UPDATE">
<?php }
?>                          
                          </div>
                      </form>
                </div>
             </div>
           </div>
        </div>
    </div>
</div>


<?php include "footer.php"?>