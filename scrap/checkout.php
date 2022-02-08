<?php
session_start();
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

	if (!empty($_SESSION['check'])) {
		foreach ($_SESSION['check'] as $key => $value){
			echo $_POST['name']."<br>";
			echo $_POST['price']."<br>";
			echo $_POST['image']."<br>";
			echo $_POST['quantity']."<br>";
			echo $_POST['total']."<br>";
		}}

?>

<!DOCTYPE html>
<html>
<head>
	<title>check out</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="fullname" placeholder="Fullname">
		<input type="text" name="address" placeholder="Address">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>