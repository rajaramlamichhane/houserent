<?php 
	include 'header.php';
	include 'db_connect.php';
	if (isset($_POST['send'])) {
		$fname = $_POST['first-name'];
		$lname = $_POST['last-name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$msg = $_POST['message'];

		$insert = "insert into feedback(firstname, lastname, email, phone, message)values('$fname', '$lname', '$email', '$phone', '$msg')";
		mysqli_query($conn, $insert);
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel = "stylesheet" href="assets/css/contact.css" type="text/css">
		<link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css" type="text/css"/>
		<title>Contact</title>
	</head>
<body>
	<div class = "contact-section">
		<div class="container">
			<div class="row">		
				<!-- Contact info -->
				<div class="contact-info">			
					<div class="in">
						<span><i class="fa fa-map-marker" area-hidden = "true"></i></span>
						<label>Address</label>
						<p class="set">Baneshwor, <br> Kathmandu, Nepal</p>
					</div>
					<div class="in">
						<span><i class="fa fa-phone" area-hidden = "true"></i></span>
						<label>Lets Talk</label>
						
						<p class="set"><a href="">	01-4985629</a>
						<br><a href="">01-4873478</a></p>
					</div>	
					<div class="in">
						<span><i class="fa fa-envelope" area-hidden = "true"></i></span>
						<label>General Support</label>
						<p class="set"><a href="">house_rent.ktm@gmail.com</a></p>
					</div>					
				</div>
				<!--contact100-form-->
				<form class="contact100-form" action="" method="post" autocomplete="off">
					<span class="contact100-form-title">
						Send Us A Message
					</span>

					<label class="label-input100" for="first-name">Tell us your name *</label>
					<div class="wrap-input100 rs1-wrap-input100">
						<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100" data-validate="Type last name">
						<input class="input100" type="text" name="last-name" placeholder="Last name">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="email">Enter your email *</label>
					<div class="wrap-input100">
						<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="phone">Enter phone number *</label>
					<div class="wrap-input100">
						<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. 9801010101">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="message">Message *</label>
					<div class="wrap-input100">
						<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" name="send">
							Send Message
						</button>
					</div>
				</form>
			</div>
			<div class="map">
				<div class="gmap_canvas">
					<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=place/Milan+Boys+Homestay=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
<?php include 'footer1.php'?>