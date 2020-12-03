<?php
include "database.php";
if(isset($_POST['update_type'])){

    $id=$_GET["room_type_id"];
    $name=$_POST["room_type_name"];
     $sql= "UPDATE tb_room_type SET room_type_name='$name' WHERE room_type_id='$id'";
     $run=$conn->query($sql);
     if($run){
         header("location:manage_r_type.php");
     }
    }

?>



<?php
include "header.php";
$id=$_GET["room_typedel_id"];
$sql="DELETE FROM tb_room_type WHERE room_type_id='$id'";
$run=$conn->query($sql);
if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_r_type.php");
}else{
        echo"error";
    }
?>