<?php include "header.php";
 include "sidebar.php";
$id=$_GET["cat_id"];
$sql="SELECT *FROM tb_categories WHERE cat_id='$id'";
$run=$conn->query($sql);
if($run->num_rows > 0){
    $show=$run->fetch_assoc(); ?>




<div class="container">
           <div class="row">
               <div class="col-lg-6 offset-3 ">
                   <div class="form-name text-center ">
                      <h1> Update Room Categories </h1>
                   </div>
                
                      <form action="delete_cat.php?cat_id=<?php echo $show["cat_id"]?>" method="post">

                          
                      
                          <label for="cat_name">Categories Name</label>
                          <input class="form-group form-control" type="text" name="cat_name" id="cat_name" value="<?php echo $show['cat_name'] ?>">
                         

                          <input  class="btn btn-primary" type="submit" name="update_cat" value="UPDATE">
<?php }
?>
                          
                      </form>
               </div>
           </div>
       </div>

<?php include "footer.php"?>