<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/owner_dashboard.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<title>Owner Dashboard</title>
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
					<a href="insertion.php" class="active"><span class="fas fa-plus"></span>
					<span>Add informarion</span></a>
				</li>

				<li>
					<a href="booked_information.php"><span class="fas fa-book-open"></span>
					<span>Booked information</span></a>
				</li>

				<li>
					<a href="logout.php"><span class="fas fa-sign-out-alt"></span>
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
				Owner Dashboard 
			</h2>

			<div class="search-wrapper">
				<span class="fa fa-search"></span>
				<input type="search" name="" placeholder="search here"/>
			</div>

			<div class="user-wrapper">
				<img src="assets/images/user.png" width="50px" height="50px" alt="">
				<div>
					<h4><?php echo $_SESSION['fullname']; ?></h4>
					<small>Owner</small>
				</div>
			</div>

		</header>
		<main>		
	
	<!-------------- INFORMATION -------------->
		<?php
		 
		include 'db_connect.php';

			$uid = $_SESSION['uid'];
/*-------------BOOKED--------------*/
		
			$sql_check = "select * from book where w_id = '$uid'";
			$result = mysqli_query($conn, $sql_check);
			while($row = mysqli_fetch_assoc($result)){
				$book = $row['h_book'];
				$u_id = $row['w_id'];
				$fullname = $row['c_fullname'];
				$phone = $row['c_phone'];
				$hid = $row['h_id'];
				if ($book == 1 && $u_id ==$uid ) {
					echo "<h1>your house is booked<br>";
					echo "<small><h5></tr><tr><th>house id: </th><td>".$hid."</td></tr></h5></small>";
					echo "<h5>Your house is booked by following user!!</h5></h1><br>";
					echo "<table><tr><th>fullname: </th><td>".$fullname."</td></tr>";
					echo "<tr><th>phone no.: </th><td>".$phone."</td></table><br><br>";
				}else{
					
				}
				
			}
/*---------------NOT BOOKED---------------*/

			$sql_check1 = "select * from houseinfo where uid = '$uid'";
			$result1 = mysqli_query($conn, $sql_check1);
			while($row1 = mysqli_fetch_assoc($result1)){
				$book = $row1['book'];	
				$id = $row1['uid'];
				if ($book == 0 && $id ==$uid ) {
					echo "<h1>your house is not booked!!<br>";
					echo "<small>it is on queue!!</small></h1>";
				}else{
					
				}
				
			}
			 ?>
			</table>
		</div>
	</main>
	</div>
</body>
</html>


				
					


		
		