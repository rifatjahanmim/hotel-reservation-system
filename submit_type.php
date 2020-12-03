<?php
session_start();
include "database.php";

if(isset($_POST["add-type"])){
    $name= $_POST['room_type_name'];

    $insert_query="INSERT INTO tb_room_type(room_type_name) VALUES ('$name')";
    $run=$conn->query($insert_query);
    
    if($run){
        $_SESSION['access']="access";


        header("location:manage_r_type.php");
        // echo"successfull";
    }else{
        echo"error" .$conn->error;
    }
}