<?php
include "database.php";
include 'functions.php';
session_start();
if(isset($_POST['update_cat'])){

    
    $name=trim($_POST["cat_name"]);

     // rules
     $rules = [
        'cat_name' => 'required'
    ];
    //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
			$_SESSION['predata'] = $_POST['cat_name'];
            header('location:edit_cat.php?cat_id='.$_GET["cat_id"]);
            
        }else{
            $id=$_GET["cat_id"];
     $sql= "UPDATE tb_categories SET cat_name='$name' WHERE cat_id='$id'" ;
     $run=$conn->query($sql);
     if($run){
         header("location:manage_r_catagories.php");
     }
    }
}


if(isset($_GET["cat_del_id"])){
    $id=$_GET["cat_del_id"];
    $sql="DELETE FROM tb_categories WHERE cat_id='$id'";
    $run=$conn->query($sql);
    if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_r_catagories.php");
}else{
        echo"error";
    }
}
?>