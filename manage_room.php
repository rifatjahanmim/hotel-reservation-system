
<?php include "header.php"?>
<?php include "sidebar.php"?>
<div class= "main-content-area">
<div class="content">
 <div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12 " >
    <div class="manage-type">
      <div class="type-form text-center">
       <h1 class="bt">Room List</h1>
       </div>
        <table class="table table-bordered tb">
          <thead>
           <th>Room Id</th>
           <th>Room Name</th>
           <th>Category Name</th>
           <th>Facility Name</th>
           <th>Room Type</th>
           <th>Details</th>
           <th>Price</th>
           <th>Created at</th>
           <th>Action</th>
          </thead>
        <?php
        $sql= "SELECT tb_room.*,
        tb_categories.cat_name,
        tb_room_type.room_type_name 
        FROM tb_room 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_room.cat_id 
        LEFT JOIN tb_room_type ON tb_room_type.room_type_id=tb_room.room_type_id";

        $run=$conn->query($sql);
         if($run->num_rows>0){
             while($show=$run->fetch_assoc()){?>
             <tbody>
             <tr>
             <td><?php echo $show["room_id"]?></td>
             <td><?php echo $show["room_name"]?></td>
             <td><?php echo $show["cat_name"]?></td>
             

             <td>
             
             <?php 
             if($show["facilities"]){
               $fac= json_decode($show["facilities"]);
               echo implode(", " , $fac );

             }
             ?></td>
             <td><?php echo $show["room_type_name"]?></td>
             <td><?php echo $show["details"]?></td>
             <td><?php echo $show["price"]?></td>
             <td><?php echo $show["created_at"]?></td>

             <td>
             <a href="edit_room.php?room_id=<?php echo $show["room_id"]?>" class="btn btn-primary">Edit</a>
             <a href="delete_room.php?room_del_id=<?php echo $show["room_id"]?>" class="btn btn-danger">Delete</a>
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
 </div>




<?php include "footer.php"?>
