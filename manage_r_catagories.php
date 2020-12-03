<?php include "header.php"?>
<?php include "sidebar.php"?>

 <div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12 text-center" >
    <div class="manage-type">
      <div class="type-form">
       <h1>Categories list</h1>
       </div>
    <div class="col-lg-8 offset-2 ">
        <table class="table table-bordered">
          <thead>
           <th>Category Id</th>
           <th>category Name</th>
           <th>Created at</th>
           <th>Action</th>
          </thead>
        <?php
        $sql="SELECT *FROM tb_categories";
        $run=$conn->query($sql);
         if($run->num_rows>0){
             while($show=$run->fetch_assoc()){?>
             <tbody>
             <tr>
             <td><?php echo $show["cat_id"]?></td>
             <td><?php echo $show["cat_name"]?></td>
             <td><?php echo $show["created_at"]?></td>

             <td>
             <a href="edit_cat.php?cat_id=<?php echo $show["cat_id"]?>" class="btn btn-primary">Edit</a>
             <a href="delete_cat.php?cat_del_id=<?php echo $show["cat_id"]?>" class="btn btn-danger">Delete</a>
             </td>
             
             </tr>
             </tbody>
             <?php

             }
         }
         ?>
       </table>
    </div>
   </div>
  </div>
 </div>
 </div>


<?php include "footer.php"?>