<?php 

	include 'db_connect.php';
	$hid = $_GET['hid'];
	$status = 1;
	$update_user_customer = "update houseinfo set status = '$status' where h_id = $hid";
	if(mysqli_query($conn, $update_user_customer)){
		header('location:house.php');
	}else{

	}

 ?>