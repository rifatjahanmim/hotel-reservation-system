<?php
include "database.php";
if(isset($_POST['update_cat'])){

    $id=$_GET["cat_id"];
    $name=$_POST["cat_name"];
     $sql= "UPDATE tb_categories SET cat_name='$name' WHERE cat_id='$id'" ;
     $run=$conn->query($sql);
     if($run){
         header("location:manage_r_categories.php");
     }
    }


$id=$_GET["cat_del_id"];
$sql="DELETE FROM tb_categories WHERE cat_id='$id'";
$run=$conn->query($sql);
if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_r_catagories.php");
}else{
        echo"error";
    }
?>