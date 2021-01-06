
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Page title -->
    <title>Hotel Reservation System</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png">
    <!-- css files from plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/all.min.css">
    <!-- master stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<?php
   include "database.php";
   session_start();
  if(isset($_POST["login"])){
      $email=$_POST["admin_email"];
      $password=$_POST["admin_password"];
      $pass= Sha1($password);
      $query= "SELECT * FROM tb_admin WHERE admin_email='$email' AND admin_password='$pass'";
      $run=$conn->query($query);

      if($run->num_rows > 0){
        $allow= $run->fetch_assoc();
        $_SESSION['admin_id']= $allow['admin_id'];
        $_SESSION['admin_name']=$allow['admin_name'];
        header("location:index.php");

    }else{
        $invalid="wrong email and password";
    }

  }
      ?>
  


      <div class="container">
           <div class="row">
               <div class="col-lg-6 offset-3 ">
                   <div class="form-name text-center ">
                      <h1> Login </h1>
                   </div>
                
                      <form action="" method="post">

                          
                        
                          <label for="admin_email">Email</label>
                          <input class="form-group form-control" type="email" name="admin_email" id="admin_email"  placeholder=" Enter your email">


                          <label for="admin_password">Password</label>
                          <input class="form-group form-control" type="password" name="admin_password" id="admin_password"  placeholder=" Enter your password">

                          <input  class="btn btn-primary" type="submit" name="login" value="Submit">

                          
                      </form>
               </div>
           </div>
       </div>

    
 