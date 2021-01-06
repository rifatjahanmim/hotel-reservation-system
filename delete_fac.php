<?php
include "database.php";
include 'functions.php';
session_start();
if(isset($_POST['update_fac'])){

     
    $name=trim($_POST["facility_name"]);

     // rules
     $rules = [
        'facility_name' => 'required'
    ];
    //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
			$_SESSION['predata'] = $_POST['facility_name'];
            header('location:edit_fac.php?facility_id='.$_GET["facility_id"]);
            
        }else{

    $id=$_GET["facility_id"];
    $name=$_POST["facility_name"];
     $sql= "UPDATE facilities SET facility_name='$name' WHERE facility_id='$id'" ;
     $run=$conn->query($sql);
     if($run){
         header("location:manage_r_facilities.php");
     }
    }
}


if(isset($_GET["fac_del_id"])){
    $id=$_GET["fac_del_id"];

$sql="DELETE FROM facilities WHERE facility_id='$id'";
$run=$conn->query($sql);
if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_r_facilities.php");
}else{
        echo"error";
    }
}
?>