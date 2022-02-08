<?php 
	
	include 'count.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/css/feedback.css">
	<link rel="stylesheet" type="text/css" href="assets/css/change_password.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/css/manage_houses.css" type="text/css"/>
	<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='bootstrap/js/bootstrap.min.js'></script>
	<title>Admin Dashboard</title>
</head>
<body>
	<input type="checkbox" name="" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><img src="assets/images/house1.png" height="20px"><span>House Rent</span></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="dashboard.php" class="active"><span class="fas fa-globe"></span>
					<span>Dashboard</span></a>
				</li>

				<li>
					<a href="house.php"><span class="fas fa-house-user"></span>
					<span>Houses</span></a>
				</li>

				<li>
					<a href="customer.php"><span class="fas fa-users"></span>
					<span>customes</span></a>
				</li>

				<li>
					<a href="owner.php"><span class="fas fa-user-check"></span>
					<span>Owners</span></a>
				</li>

				<li>
					<a href="feedback.php"><span class="far fa-comments"></span>
					<span>Feedback</span></a>
				</li>

				<li>
					<a href="change_password.php"><span class="far fa-user-circle"></span>
					<span>Accounts</span></a>
				</li>

				<li>
					<a href="admin_logout.php"><span class="fas fa-sign-out-alt"></span>
					<span>Logout</span></a>
				</li>

			</ul>			
		</div>
	</div>

	<div class="main-content">
		<header>

			<h2>
				<label for="nav-toggle">
					<span class="fa fa-align-justify"></span>
				</label>
				Dashboard
			</h2>

			<div class="search-wrapper">
				<span class="fas fa-search"></span>
				<input type="search" name="" placeholder="search here"/>
			</div>

			<div class="user-wrapper">
				<img src="assets/images/raja.jpg" width="50px" height="50px" alt="">
				<div>
					<h4>Rajaram Lamichhane</h4>
					<small>super admin</small>
				</div>
			</div>

		</header>			
		<main id="dashboard">


