<?php
session_start();
include 'database.php';
include 'functions.php';
try {
    $conn->begin_transaction();
    
    if(isset($_POST['booking'])){ 
       $admin_id=$_SESSION['admin_id'];
       
       $check_in=$_POST['check_in'];
       $check_out=$_POST['check_out'];
       $cat_id=$_POST['cat_id'];
       $room_type_id=$_POST['room_type_id'];
       $rooms=$_POST['rooms'];
       $guest_name=$_POST['guest_name'];
       $guest_phone=$_POST['guest_phone'];
       $guest_add=$_POST['guest_address'];
       $adult=$_POST['adult'];
       $adult_guest_name=$_POST['adult_name'];
       $adult_guest_age=$_POST['adult_age'];
       $child_guest_name=$_POST['child_name'];
       $child_guest_age=$_POST['child_age'];
       $sub_total=$_POST['sub_total'];
       $vat=$_POST['vat'];
       $discount=$_POST['discount'];
       $grand_total=$_POST['grand_total'];
       $paid=$_POST['paid'];
       $due=$_POST['due'];
       $payment_method=$_POST['payment_method'];

            // rules
     $rules = [
        'guest_name' => 'required',
        'guest_phone' => 'required',
        'guest_address' => 'required',
       
    ];
    //check validation
    $errors = formValidate($_POST, $rules);

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        

        header('location:booking_room.php');
        
    }else{
      
    // insert guest
       $sql="INSERT INTO guest(adult,child,guest_name,guest_phone,guest_address) VALUES ('$adult','$child','$guest_name','$guest_phone','$guest_add')";
       $run= $conn->query($sql);
	   if($run){
			// insert member
            $sql="SELECT * FROM guest ORDER BY `guest_id` DESC LIMIT 1";
            $run=$conn->query($sql);
          
            $result=$run->fetch_assoc();
            $guest_id= $result['guest_id'];
    
                
           foreach($adult_guest_name as $key => $a_name) {
               $age = $adult_guest_age[$key];
               $query = "INSERT INTO members(guest_id,member_name,member_age,type)values('$guest_id', '$a_name', '$age', 'adult')";
               $run= $conn->query($query);
           }
           foreach($child_guest_name as $key => $c_name) {
               $age = $child_guest_age[$key];
               $query = "INSERT INTO members(guest_id,member_name,member_age,type)values('$guest_id', '$c_name', '$age', 'child')";
               $run= $conn->query($query);
           }  
          
        // insert booking
            $sql="INSERT INTO booking(guest_id,admin_id,check_in_time,check_out_time,status,sub_total,vat,discount,grand_total) VALUES ('$guest_id','$admin_id','$check_in','$check_out','1','$sub_total','$vat','$discount','$grand_total')";
            $run= $conn->query($sql);
         if($run){
             // insert booking room

                    $sql="SELECT * FROM booking  ORDER BY `book_id` DESC LIMIT 1";
                    $run=$conn->query($sql); 
                    
                    $booking = $run->fetch_assoc();
                    $booking_id = $booking['book_id'];
                            foreach($rooms as $key => $room_id) {
                                $sql="INSERT INTO booking_room(book_id,room_id) VALUES ('$booking_id','$room_id')";
                                $run= $conn->query($sql);

                            }

             // insert payment
         
                 $sql="INSERT INTO payment(book_id,paid,due,method) VALUES ('$booking_id','$paid','$due','$payment_method')";
                 $run= $conn->query($sql);
     
         } else {
             throw new Exception($conn->error);
         }
	
        }
        header("location:book_details.php");
        }
        }
        else{
			echo 'error'.$conn->error;
        }
        
    

      // Update payment
      if(isset($_POST['updatepayment'])){
        $id= $_GET['payment_id'];
                                            $paid=$_POST['paid'];
                                            $due=$_POST['due'];
                                            $sql="UPDATE payment set paid='$paid',due='$due' WHERE payment_id='$id'";
                                            $run= $conn->query($sql);
                                            if($run){
                                                header('location:booking_list.php');

                                            }else{
                                                echo 'error'.$conn->error;
                                            }
    }
     //Cancel Pending Booking
     if (isset($_GET['bok_del_id'])) {
        $id=$_GET['bok_del_id'];
        // $sql="DELETE FROM booking WHERE book_id='$id'";
        $sql="UPDATE booking set `status`= 2 WHERE book_id='$id'";
        $run=$conn->query($sql);
        if($run){
            
            header('location:booking_list.php');
        }
        else{
            echo 'Error'.$conn->error;
        }
    }





    $conn->commit();

}catch(\Exception $e) {
    $conn->rollback();
    echo 'An error occurred while booking store. '. $e->getMessage();
}

