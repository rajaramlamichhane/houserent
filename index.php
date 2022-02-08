<?php 
	include 'admin/count.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel = "stylesheet" href="assets/css/index.css" type="text/css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<title>home</title>
</head>
<body>
	<div class="home-header">
			<div class="image" style="background-image: url('assets/images/1200px-Hong_Kong_Harbour_Night_2019-06-11.jpg')">
		</div>
		<div class="content">
		<div class= "content-wrapper">
			<h1>Best way to find house</h1>
			<h2>house rent</h2>
				<div class="line">
				</div>
				<div class="social-icon">
				<span><i class="fa fa-facebook"></i></span>
				<span><i class="fa fa-twitter"></i></span>
				<span><i class="fa fa-instagram"></i></span>
				<span><i class="fa fa-google"></i></span>
				</div>
				<div class="button-section">
					<a href="">About</a>
				</div>
		</div>
		</div>
	</div>
	<!-- <div class="inner-header">
		<div class="title">
			<a href='#'><h1>house rent</h1></a>
		</div>
		<div class = "nav-menu">
			<span id="span" onclick="myFunction4()">&#9776</span>
			<ul id="menu1">
				<li><a href = "registration.php">Sign Up</a></li>		
				<li><a href = "login.php">Log In</a></li>		
				<li><a href = "contact.php">Contact</a></li>
				<li><a href="#">About</a></li>	
				<li><a href = "index.php">Home</a></li>
			</ul>
		</div>
	</div> -->
	<header>
		<div class="nav-bar">
			<a href="#" class="logo">House Rent</a>
			<div class="menu-right">
				<span id="span" onclick="myFunction3()">&#9776</span>
				<ul id = "menu">
					<li><a href = "index.php">Home</a></li>			
					<li><a href = "contact.php">Contact</a></li>
					<li><a href = "login.php">Log In</a></li>
					<li><a href = "registration.php">Sign Up</a></li>
				</ul>
			</div>
		</div>
	</header>

	<script type="text/javascript">
		function myFunction3(){
			var x = document.getElementById('menu');
			if (x.style.display == "block") {
				x.style.display ="none";
			}else{
				x.style.display ="block";
			}
		}
	</script>
	<div class="container1">
		<!-- starting sliding image  -->
		<!-- <div class="slideshow-container">

			<div class="mySlides fade">
				<div class="numbertext">1 / 3</div>
				<img src="assets/images/valley.jpg" style="width:100%; height:200px">				
			</div>

			<div class="mySlides fade">
			   	<div class="numbertext">2 / 3</div>
			  	<img src="assets/images/img_5terre_wide.jpg" style="width:100%; height:200px">	  	
			</div>

			<div class="mySlides fade">
			  	<div class="numbertext">3 / 3</div>
			  	<img src="assets/images/1200px-Hong_Kong_Harbour_Night_2019-06-11.jpg" style="width:100%; height:200px">			  	
			</div>

		</div>
		<br>

		<div style="text-align:center">
		  	<span class="dot"></span> 
		  	<span class="dot"></span> 
		  	<span class="dot"></span> 
		</div> -->
		<!----------- Web info --------->

		<div class="row">
			<h1 class="headline">Are you lookig for new room!!	</h1> 
			
			<div class="both">
				<div class="img"></div>
				<div class="set">
				<div class = "item">
					<strong>For Customers:</strong>
					<p>This website is about house renting system, if you are looking for new room or house or flat you can visit the webpage any time and can figure out the best facilated rooms according to location and price where you wish to live.
					<br/><br/>
					If you want to book the room or flat or house, you need to <a href="login.php">login</a> or create new account from <a href="registration.php">signup</a> page as customer.</p>
					
				</div>
				<div class = "item">
					<strong>For Owners:</strong>
					<p>In the above website as a house owner you need to post the all required information of your house and which types of renter you are looking for your vacant house, rather than sharing your house for honest renter.
					<br/><br/>
					If you want to post the information about your house, you need to <a href="login.php">login</a> or create new account from <a href="registration.php">signup</a> page as Owner.</p>
					
				</div>
			</div>
			</div>
		</div>
		<!------- cards ----------->
		<main>
			<h1 class="headline">User details</h1>
			<div class="cards">
				<div class="card-single">
					<h2>About Us</h2>
					<p>This website is about house renting system, if you are looking for new room or house or flat you can visit the webpage any time and can figure out the best facilated rooms according to location and price where you wish to live. </p>
				</div>

				<div class="card-single">
					<div>
						<h1><?php echo $users; echo "+"; ?></h1>
						<span>Total Users</span>
					</div>
					<div>
						<span class="fas fa-user-plus"></span> 
					</div>
				</div>

				<div class="card-single">
					<div>
						<h1><?php echo $owners; echo "+";?></h1>
						<span>Total Owners</span>
					</div>
					<div>
						<span class="fas fa-user-check"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
						<h1><?php echo $customers; echo "+";?></h1>
						<span>Total Customers</span>
					</div>
					<div>
						<span class="fa fa-users"></span>
					</div>
				</div>

				
				<div class="card-single">
					<div>
						<h1><?php echo $book; echo "+";?></h1>
						<span>Total Houses Booked</span>
					</div>
					<div>
						<span class="fas fa-house-user"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
						<h1>1</h1>
						<span>Total Admin</span>
					</div>
					<div>
						<span class="fas fa-user-shield"></span>
					</div>
				</div>

			</div>
		</main>
	</div>
	<!-- Image slideshow script -->
	<!-- <script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  	var i;
		  	var slides = document.getElementsByClassName("mySlides");
		  	var dots = document.getElementsByClassName("dot");
		  	for (i = 0; i < slides.length; i++) {
		    	slides[i].style.display = "none";  
		  	}
		  	slideIndex++;
		  	if (slideIndex > slides.length) {
		  		slideIndex = 1;
		  	}    
		  	for (i = 0; i < dots.length; i++) {
		    	dots[i].className = dots[i].className.replace(" active", "");
		  	}
		  	slides[slideIndex-1].style.display = "block";  
		  	dots[slideIndex-1].className += " active";
		  	setTimeout(showSlides, 3000); // Change image every 2 seconds
		}
		</script> -->
		<script type="text/javascript">
		function myFunction4(){
			var x = document.getElementById('menu1');
			if (x.style.display == "block") {
				x.style.display ="none";
			}else{
				x.style.display ="block";
			}
		}
	</script>
</body>
</html>

<?php
 	include 'footer1.php'; 
 ?>