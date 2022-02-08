<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/booked_data.css">
</head>
<body>

</body>
</html>
<?php
	session_start();
	include 'db_connect.php';
	$hid = $_GET['h_id'];

		/*Book update*/
	$book = 1;
	$update_user_customer = "update houseinfo set book = '$book' where h_id = $hid";
	mysqli_query($conn, $update_user_customer);
	
	$sql_get_houseinfo = "select * from houseinfo";

	$res = mysqli_query($conn,$sql_get_houseinfo)or die("error");
	if (mysqli_num_rows($res) > 0) {
		while($row1 = mysqli_fetch_assoc($res)) {
	   		$wid=  $row1["uid"];
	   		$wlocation = $row1['location'];
	   		$wphone = $row1['phone'];
	   		$hbook = $row1['book']; 
   		}
  	}


  	/*Users fetct*/
	$username = $_SESSION['username'];

	$sql_get_user_id = "select * from users where username= '$username'";

	$result = mysqli_query($conn,$sql_get_user_id);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
	   		$u=  $row["uid"];
	   		$cfullname = $row['fullname'];
	   		$cphone = $row['phone'];
   		}
  	}

    	
  	$sql_insert_book = "insert into book(c_uid, c_fullname, c_phone, h_id, w_id, h_location, h_phone, h_book) values ('$u', '$cfullname', '$cphone', '$hid', '$wid', '$wlocation', '$wphone', '$hbook')";
  		if(mysqli_query($conn, $sql_insert_book)){			
			//header('location:house_detail1.php');?>
			<div class = "edit">
				<strong>Booking Successfully!!</strong><br>
				<label>Press Ok!!</label>
				<form action = "" method="post">
					<input type="submit" name="ok" value = "Ok">
				</form>
			</div>


		<?php
	}
	if(isset($_POST['ok'])) {
		header('location:house_detail1.php');
	}
?>
