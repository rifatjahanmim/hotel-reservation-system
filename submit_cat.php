<?php
session_start();
include "database.php";
include 'functions.php';

if(isset($_POST["register"])){
    $name= trim($_POST["cat_name"]);

    // rules
    $rules = [
        'cat_name' => 'required'
    ];

    //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
            header('location:add_r_catagories.php');
            
        }else{
            $insert_query="INSERT INTO tb_categories(cat_name) VALUES ('$name')";
            $run=$conn->query($insert_query);
            
            if($run){
               
        
        
                header("location:manage_r_catagories.php");
               
            }else{
                echo"error" .$conn->error;
            }
        }

    
}