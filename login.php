<?php
session_start();
include 'header.php';
/*css design*/
echo "<style>
		h3{
			padding-left:500px;
			color: red;
		}
	</style>";
	/*css design ends here*/

	include 'db_connect.php';

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$pwd = $_POST['password'];
		$usertype = "";

		if(!empty($_POST['usertype'])){
			$usertype = $_POST['usertype'];
		}

		$uid = "";

		$sql_get_user_id = "SELECT uid FROM users where username= '$username'";

		$result = mysqli_query($conn,$sql_get_user_id);

		if (mysqli_num_rows($result) > 0) {
		 
			  while($row = mysqli_fetch_assoc($result)) {
			   	$uid=  $row["uid"];
			  }
			
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

			$sql_login_user = "SELECT * FROM users WHERE username= ? AND password= ? AND ur_id = ?";
			$stmt2 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt2, $sql_login_user)){

			}else{
				mysqli_stmt_bind_param($stmt2, "sss", $username, $pwd, $ur_id);
				mysqli_stmt_execute($stmt2);
				$result1 = mysqli_stmt_get_result($stmt2);	

				if(mysqli_num_rows($result1)>0){
					$array = mysqli_fetch_assoc($result1);
					$_SESSION['username'] = $array['username'];
					$_SESSION['fullname'] = $array['fullname'];
					$_SESSION['uid'] = $array['uid'];					
					if($array['ur_id'] == 2){
						header("Refresh:0,URL= insertion.php");
					}
					else if($array['ur_id'] == 3){
						header("Refresh:0,URL= house_detail1.php");
					}		
				}else{
					echo "<h3> User not found, try again or register!</h3>";
				}
			}
		}
}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css" type="text/css"/>
	<title>login form</title>
</head>
<body>

	<div class="container">
		<div class="margin">
		<div class="form-box">
			<h1>Login form</h1>
			<form method="POST" action="" autocomplete="off">
				<div class="input-box">
					<i class="fa fa-envelope-o"></i>
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="input-box">
					<i class="fa fa-key"></i>
					<input type="password" name="password" placeholder="Password" id="myInput"> 
					<span class="eye" onclick="myFunction()">
						<i id="hide1" class="fa fa-eye"></i>
						<i id="hide2" class="fa fa-eye-slash"></i>
					</span>
				</div>
				<div class="input-box">
					<i class="fa fa-users"></i>
					<select name = "usertype">
						<optgroup label = "usertype">
							<option value="Owner">Owner</option>
							<option value="Customer">Customer</option>
						</optgroup>
					</select>
				</div>
				<input type="submit" name="login" value="Log in" class="login-btn">
			</form>
		</div>
	</div>
	</div>

	<?php include 'hide_password.php' ?>

</body>
</html>