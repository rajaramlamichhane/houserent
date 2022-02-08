<?php 

	include 'header.php';
	 include 'db_connect.php';

	if(isset($_POST['submit'])){

		$usertype = $_POST['usertype'];
		$fullname = $_POST['fullname'];
		$gender = "";
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$err = "";
		$noterr = "";
		$phone_pattern = "/^[0-9]{10}+$/";

		if(isset($_POST['g'])){
			$gender = $_POST['g'];
		}


		if(empty($usertype) || empty($firstname) || empty($lastname) || empty($gender) || empty($phone) || empty($email) || empty($password) || empty($cpassword) || empty($username)){

			if(!preg_match($phone_pattern, $phone)){
					$err = "Invalid phone format";
				}else{
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

	  				$err = "Invalid email format";
				}else{

					if(!$password==$cpassword){
						$err = 'Password didnot match.';

			        } else {
			          
			          $ur_id = "";


						/* to get user id*/
						$sql_get_userRole_id = "SELECT *FROM user_roles where role_name=?";
						$stmt1 = mysqli_stmt_init($conn);

						if(!mysqli_stmt_prepare($stmt1, $sql_get_userRole_id)){

						}else{
							mysqli_stmt_bind_param($stmt1, "s",$usertype);
							mysqli_stmt_execute($stmt1);
							$result = mysqli_stmt_get_result($stmt1);
							while($row = mysqli_fetch_assoc($result)){
								$ur_id = $row['ur_id'];
							}	
						}

						/* to get user id ends here*/

						$sql_insert_user = "INSERT INTO users(usertype,fullname,gender,phone,email,username,password,ur_id) VALUES (?,?,?,?,?,?,?,?)";

						/* CREATE PREPARE STAREMENT*/
						$stmt2 = mysqli_stmt_init($conn);

						if(!mysqli_stmt_prepare($stmt2, $sql_insert_user)){

						}else{
							mysqli_stmt_bind_param($stmt2, "ssssssss",$usertype,$fullname,$gender,$phone,$email,$username,$password,$ur_id);
							mysqli_stmt_execute($stmt2);
						}

			        }
					
				}
			}
			}else{
			$err = "Empty fields";
		}

	}
mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel = "stylesheet" href="assets/css/registration.css" type="text/css">
	<link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css" type="text/css"/>
	 
	<title>Registration page</title>
	<style type="text/css">
		#err{
			text-align: center;
			color: red;
		}
		#noterr{
			text-align: center;
			
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="margin">
			<div class="form-box">
				<!-- error div started -->
				<div id="err">
					<?php 
						if(isset($err)){
							echo $err;
						}?>				
				</div>
				<div id="noterr">
					<?php 
						if(isset($noterr)){
							echo $noterr;
						}?>				
				</div>

				<!-- error div ends here -->

				<h1>Registration Form</h1>
				<form action = "" method = "post" autocomplete="off">
					<div class="input-box">
						<i class="fa fa-user"></i>
						<input type="text" name="fullname" placeholder="Fullname">
					</div>

					<!-- full name div ends here -->

					<div class="gender-box">
						<i class="fa fa-transgender-alt"></i>
						<span>Gender:</span>
							<input type = "radio" name = "g" value = "male"  /><label>Male</label>
							<input type = "radio" name = "g" value = "female"  /><label>Female</label>
							<input type = "radio" name = "g" value = "others" /><label>Others</label>
					</div>

					<!-- gender div ends here -->

					<div class="input-box">
						<i class="fa fa-phone"></i>
						<input type="text" name="phone" placeholder="Phone">
					</div>

					<!-- phone div ends here -->

					<div class="input-box">
						<i class="fa fa-users"></i>
						<select name = "usertype">
							<optgroup label = "Usertype">
								<option value="Owner">Owner</option>
								<option value="Customer">Customer</option>									
							</optgroup>
						</select>
					</div>

					<!-- user type div ends here -->

					<div class="input-box">
						<i class="fa fa-envelope-o"></i>
						<input type="text" name="email" placeholder="Email">
					</div>

					<!-- email div ends here -->

					<div class="input-box">
						<i id="user" class="fa fa-user-plus"></i>
						<input type="text" name="username" placeholder="Username">
					</div>

					<!-- user name div ends here -->

					<div class="input-box">
						<i class="fa fa-key"></i>
						<input type="password" name="password" placeholder="Password" id="myInput"> 
						<span class="eye" onclick="myFunction()">
							<i id="hide1" class="fa fa-eye"></i>
							<i id="hide2" class="fa fa-eye-slash"></i>
						</span>
					</div>

					<!-- password div ends here -->

					<div class="input-box">
						<i class="fa fa-key"></i>
						<input type="password" name="cpassword" placeholder="Confirm Password" id="myInput2"> 
						<span class="eye" onclick="myFunction2()">
							<i id="hide3" class="fa fa-eye"></i>
							<i id="hide4" class="fa fa-eye-slash"></i>
						</span>
					</div>

					<!-- confirm password div ends here -->
					
					<input type = "submit" name = "submit" value = "sign up" class="login-btn" />
				</form>
			</div>
		</div>

		<!-- registration-form div ends here -->
	
	<?php include 'hide_password.php' ?>
	</div>
</body>
</html>