<?php
session_start();
include "database.php";
include 'functions.php';


if(isset($_POST["add_facilities"])){
    $name= trim($_POST["facility_name"]);

    // rules
    $rules = [
        'facility_name' => 'required'
    ];

       //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
            header('location:add_r_facilities.php');
            
        }else{
  if(isset($_POST["add_facilities"])){
    $name= $_POST["facility_name"];

    $insert_query="INSERT INTO facilities(facility_name) VALUES ('$name')";
    $run=$conn->query($insert_query);
    
    if($run){
        $_SESSION['access']="access";


        header("location:manage_r_facilities.php");
    
       
    }else{
        echo"error" .$conn->error;
    }
  }
}
}