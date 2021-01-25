<?php
session_start();
include "database.php";
include 'functions.php';

if(isset($_POST["add-type"])){
    $name= trim($_POST['room_type_name']);

        // rules
        $rules = [
            'room_type_name' => 'required'
        ];

            //check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
            header('location:add_r_type.php');
            
        }else{

    $insert_query="INSERT INTO tb_room_type(room_type_name) VALUES ('$name')";
    $run=$conn->query($insert_query);
    
    if($run){
       

        header("location:manage_r_type.php");
        // echo"successfull";
    }else{
        echo"error" .$conn->error;
    }
  }
}
    