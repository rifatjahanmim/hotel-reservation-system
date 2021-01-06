<?php
include "database.php";
include 'functions.php';
session_start();
if(isset($_POST['update-room'])){


    
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
           $_SESSION["predata"] =$_POST;
          
           header('location:edit_room.php?room_id='.$_GET["room_id"]);
           
       }else{
        $id=$_GET["room_id"];
    $fac= json_encode($fac);
     $sql= "UPDATE tb_room SET room_name='$name',cat_id='$cat',facilities='$fac' , room_type_id='$room_type',details='$detail', price='$price' WHERE room_id='$id'" ;
     $run=$conn->query($sql);
     if($run){
         header("location:manage_room.php");
     }
    }
};

if(isset($_GET["room_del_id"])){
$id=$_GET["room_del_id"];
$sql="DELETE FROM tb_room WHERE room_id='$id'";
$run=$conn->query($sql);
if($run){
    $_SESSION["delete"]=["delete"];
    header("location:manage_room.php");
}else{
        echo"error";
    }
};
?>