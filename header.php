<?php include "database.php";
session_start();
if(!isset($_SESSION['admin_id'])){
    header("location:admin_login.php");
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Page title -->
    <title>Admin Panel</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- css files from plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/all.min.css">
    <!-- master stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<!-- page wrapper area -->
<div class="page-wrapper">
		<!-- header area -->
		<header class="header-area">
			<div class="header-logo">
				<img src="assets\images\h1.jpg" width="120px" height="40px" >
				<div class="nav-bar">
					<i class="fas fa-bars"></i>
				</div>
			</div>
			<div class="hrrs"><h3>Hotel Room Reservation System</h3></div>
			
			<div class="header-nav">
				
			<div class="logout-btn">
				<a href="logout.php" class="btn btn-dark">Logout</a>
			</div>
			</div>
		</header>