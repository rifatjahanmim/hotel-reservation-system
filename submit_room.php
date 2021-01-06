<?php
session_start();
include "database.php";
include 'functions.php';

if(isset($_POST["add-room"])){
    $name=trim($_POST['room_name']);
    $cat=trim($_POST['cat_id']);
    $fac=$_POST['facilities'];
    $room_type=trim($_POST['room_type_id']); 
    $detail=trim($_POST['details']);
    $price=trim($_POST['price']);

     // rules
     $rules = [
        'room_name' => 'required',
        'cat_id' => 'required',
        'facilities' => 'required',
        'room_type_id' => 'required',
        'details' => 'required',
        'price' => 'required'
    ];
    //check validation
    $errors = formValidate($_POST, $rules);

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        

        header('location:add_room.php');
        
    }else{
    $fac= json_encode($fac);
    $insert_query="INSERT INTO tb_room( room_name,cat_id,facilities,room_type_id,details,price) VALUES ('$name','$cat','$fac','$room_type', '$detail','$price')";
    $run=$conn->query($insert_query);

    if($run){
       


        header("location:manage_room.php");
    }else{
        echo"error" .$conn->error;
    }
}
}