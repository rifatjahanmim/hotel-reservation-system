<?php
include "database.php";
include 'functions.php';
session_start();
if(isset($_POST['update_type'])){
     
    $name=trim($_POST["room_type_name"]);

    // rules
    $rules = [
        'room_type_name' => 'required'
    ];
     //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
			$_SESSION['predata'] = $_POST['room_type_name'];
            header('location:edit_type.php?room_type_id='.$_GET["room_type_id"]);
            
        }else{

    $id=$_GET["room_type_id"];
    $name=$_POST["room_type_name"];
     $sql= "UPDATE tb_room_type SET room_type_name='$name' WHERE room_type_id='$id'";
     $run=$conn->query($sql);
     if($run){
         header("location:manage_r_type.php");
     }
    }

}




if(isset($_GET["room_typedel_id"])){
    $id=$_GET["room_typedel_id"];
$sql="DELETE FROM tb_room_type WHERE room_type_id='$id'";
$run=$conn->query($sql);
if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_r_type.php");
}else{
        echo"error";
    }
}
?>