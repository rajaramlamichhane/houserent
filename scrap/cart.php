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


	if(isset($_POST['checkout'])){
		if (isset($_SESSION['check'])) {

			$session_array_id1 = array_column($_SESSION['check'], "id");

			if (!in_array($_GET['id'], $session_array_id1)) {
				$session_array1 = array(
					'id' => $_GET['id'],
					"name" => $_POST['name'],
					"price" => $_POST['price'],
					"quantity" => $_POST['quantity'],
					"total" => $_POST['total'],
					"image" =>$_POST['image'] 
				);

				$_SESSION['check'][] = $session_array1;
			}
		}else{
			$session_array1 = array(
				'id' => $_GET['id'],
				"name" => $_POST['name'],
				"price" => $_POST['price'],
				"quantity" => $_POST['quantity'],
				"total" => $_POST['total'],
				"image" =>$_POST['image'] 
			);

			$_SESSION['check'][] = $session_array1;
		}
	}

?>
<?php include 'headder.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<style type="text/css">
		img{
			width: 150px;
			height: 50px;
			background: lightblue;
			background: radial-gradient(white 30%, lightblue 70%); 

		}
	</style>

</head>
<body>
	<div>
		<?php

			$total = 0;

			$output = "";
			$output .= "
				<table class='table table-bordered table-striped'>
				<tr>
					<th>ITEM IMAGE</th>
					<th>ID</th>
					<th>ITEM NAME</th>
					<th>ITEM PRICE</th>
					<th>ITEM QUANTITY</th>
					<th>TOTAL PRICE</th>
					<th>ACTION</th>
				</tr>
			";

			if (!empty($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $key => $value) {
					$image = $value['image'];
					$output .="
						<tr>
							<td class = 'img' >
								<img src='../assets/images/$image' alt='Image is not available'/>
							</td> 
							<td>".$value['id']."</td>
							<td>".$value['name']."</td>
							<td>".$value['price']."</td>
							<td>".$value['quantity']."</td>
							<td>$".number_format($value['price'] * $value['quantity'],2)."</td>
							<td>
								<a href='cart.php?action=remove&id=".$value['id']."'>
								<button class = 'btn btn-danger bt-block'>Remove <i class = 'fas fa-trash'></i></button>
								</a>
							</td>
						</tr>


					";

					$total = $total + $value['price'] * $value['quantity'];
					$id = $value['id'];
				}

				$output .= "

					<tr>
						<td colspan='4'></td>
						<td><b>Total Price</b></td>
						<td>".number_format($total,2)."</td>
						<td>
							<form action='' method='post'>
								
									<input type='hidden' name='name' value='".$value['name']."'>
									<input type='hidden' name='price' value='".$value['price']."'>
									<input type='hidden' name='quantity' value='".$value['quantity']."'>
									<input type='hidden' name='image' value='$image'>
									<input type='hidden' name='total' value='$total'>
									<a href = 'checkout.php?check=".$id."'>
									<button name = 'checkout' class = 'btn btn-warning bt-block'>Check Out</button>
									</a>

							</form>
						</td>
					</tr>
				";


			}

			echo $output;
		?>
		
	</div>
<?php 
	if (isset($_GET['action'])) {
		/*if ($_GET['action'] == "clearall") {
			unset($_SESSION['cart']);
		}*/

		if ($_GET['action'] == "remove") {
			foreach ($_SESSION['cart'] as $key => $value) {
				if ($value['id'] == $_GET['id']) {
					unset($_SESSION['cart'][$key]);
				}
			}
		}
	}
?>

</body>
</html>