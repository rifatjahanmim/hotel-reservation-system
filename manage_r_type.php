<?php include "header.php"?>
<?php include "sidebar.php"?>

 <div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12 text-center" >
    <div class="manage-type">
      <div class="type-form">
       <h1>Room Type list</h1>
       </div>
    <div class="col-lg-8 offset-2 ">
        <table class="table table-bordered">
          <thead>
           <th>Room Id</th>
           <th>Room Name</th>
           <th>Action</th>
          </thead>
        <?php
        $sql="SELECT *FROM tb_room_type";
        $run=$conn->query($sql);
         if($run->num_rows>0){
             while($show=$run->fetch_assoc()){?>
             <tbody>
             <tr>
             <td><?php echo $show["room_type_id"]?></td>
             <td><?php echo $show["room_type_name"]?></td>

             <td>
             <a href="edit_type.php?room_type_id=<?php echo $show["room_type_id"]?>" class="btn btn-primary">Edit</a>
             <a href="delete_type.php?room_typedel_id=<?php echo $show["room_type_id"]?>" class="btn btn-danger">Delete</a>
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