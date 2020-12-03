<?php
session_start();
include "database.php";

if(isset($_POST["register"])){
    $name= $_POST["cat_name"];

    $insert_query="INSERT INTO tb_categories(cat_name) VALUES ('$name')";
    $run=$conn->query($insert_query);
    
    if($run){
        $_SESSION['access']="access";


        header("location:manage_r_catagories.php");
       
    }else{
        echo"error" .$conn->error;
    }
}