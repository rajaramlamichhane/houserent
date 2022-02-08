<?php 
	session_start();
	$servername = "localhost";
	$username= "root";
	$password="";
	$db_name="newdb";

	$conn = mysqli_connect($servername,$username,$password,$db_name);


	if(isset($_POST['add_to_cart'])){
		if (isset($_SESSION['cart'])) {

			$session_array_id = array_column($_SESSION['cart'], "id");

			if (!in_array($_GET['id'], $session_array_id)) {
				$session_array = array(
					'id' => $_GET['id'],
					"name" => $_POST['name'],
					"price" => $_POST['price'],
					"quantity" => $_POST['quantity'],
					"image" =>$_POST['image']
				);

				$_SESSION['cart'][] = $session_array;
			}
		}else{
			$session_array = array(
				'id' => $_GET['id'],
				"name" => $_POST['name'],
				"price" => $_POST['price'],
				"quantity" => $_POST['quantity'],
				"image" =>$_POST['image'] 
			);

			$_SESSION['cart'][] = $session_array;
		}
	}

?> 

<!DOCTYPE html>
<html>
<head>
	<title>shopping</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

	<!-- stylesheet -->
	<link rel="stylesheet" type="text/css" href="shopping.css">
	
</head>
<body>
	<?php include 'headder.php';?>
	<div class="container">
		<div class="row text-center py-5">
			<?php
				
				$sql = "SELECT * FROM producttb";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result)>0) {
					while ($row = mysqli_fetch_assoc($result)) {?>
									
						<div class="col-md-3 col-sm-6 my-3 my-0">
							<form action="index.php?id=<?=$row['id']?>" method="post">
								<div class="card shadow">
									<div>
										<?php $image = $row['product_image']; 
										echo "<img src='../assets/images/$image' alt='Image is not available' class='img-fluid card-img-top'/>"; ?>
									</div>
									<div class="card-body">
										<h5 class="card-title"><?php echo $row['product_name']; ?></h5>
										<h6>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										</h6>
										
										<h5>
											<small><s class="text-secondary"><?php echo $row['discount']; ?></s></small>
											<span class="price"><?php echo $row['product_price']; ?></span>
										</h5>
										<input type="hidden" name="name" value="<?=$row['product_name'] ?>">
										<input type="hidden" name="price" value="<?=$row['product_price'] ?>">
										<input type="hidden" name="image" value="<?=$image ?>">
										<input type="number" name="quantity" value="1" class="form-control">
										<button type="submit" class="btn btn-warning my-3" name="add_to_cart">Add to cart <i class="fas fa-shopping-cart"></i></button>
									</div>
								</div>
							</form>				
						</div>		
			<?php
					}
				}
			?>
			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	
</body>
</html>
