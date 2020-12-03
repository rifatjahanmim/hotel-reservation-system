<?php
session_start();
include "database.php";

if(isset($_POST["add_facilities"])){
    $name= $_POST["facilities_name"];

    $insert_query="INSERT INTO facilities(facilities_name) VALUES ('$name')";
    $run=$conn->query($insert_query);
    
    if($run){
        // $_SESSION['access']="access";


        // header("location:manage_r_facilities.php");
        echo "successfull";
       
    }else{
        echo"error" .$conn->error;
    }
}