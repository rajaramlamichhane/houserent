<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rent</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<!-- stylesheet -->
	<link rel="stylesheet" type="text/css" href="house_detail1.css">
	
</head>
<body>
	<header>
		<div class="nav-bar">
			<a href="#" class="logo"><img src="assets/images/house1.png" height="20px">House Rent</a>
			
			<div class="menu-right">
				<ul id = "menu">
					<li><a href = "logout.php"><i class = "fas fa-sign-out-alt">Log Out</i></a></li>
					<li id="username"><i class = "fas fa-user-circle"></i><?php echo $_SESSION['fullname']; ?></li>
					
					
				</ul>
			</div>
		</div>
	</header>
	
	<div class="container">
		<div class="headline">Rent</div>
		<div class="row text-center py-5">
			<?php
				include 'db_connect.php';								
					$sql_view_owners = "SELECT * FROM houseinfo where status = 1 AND book = 0";
					$stmt = mysqli_stmt_init($conn);
					$view_customer=[];
					if(!mysqli_stmt_prepare($stmt, $sql_view_owners)){
					}else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						while($row = mysqli_fetch_assoc($result)){
							array_push($view_customer, $row);
						}	
					}							
			?>
		
			<?php foreach($view_customer as $value) { ?>

			<div class="col-md-3 col-sm-6 my-0">
				<form action="" method="post">
					<div class="card shadow">
						<div>
							<?php $image = $value['image']; 
									
							echo "<img src='assets/images/$image' alt='image not available' class='img-fluid card-img-top'>"; ?>

						</div>
						<div class="card-body">
							<h5 class="card-title my-0">
								<?php echo "<div class= 'font'>A ".$value['room_type']." for rent in"; ?>
								<?php echo $value['location']; ?></div>
								<?php echo "<div class= 'font1'><i class='fa fa-map-marker'></i>".$value['location']; ?></div>							
							</h5>
							<p class="card-text my-0">
								If you want detail click on the cart. 
							</p>
							<h5>
								<small class="text-secondary"><?php echo "Rs. ".$value['price']; ?></small>
								<span class="price">
								</span>
							</h5>
								<div class="btn-group w-100">
									<a href="detail_info.php?h_id=<?php echo $value['h_id']; ?>" class="btn btn-sm btn-outline-info w-50">View Detail</a>							
								</div>
						</div>
					</div>
				</form>				
			</div>											
			<?php } ?>				
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
