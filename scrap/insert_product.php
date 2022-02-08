<?php
	$servername = "localhost";
	$username= "root";
	$password="";
	$db_name="newdb";

	$conn = mysqli_connect($servername,$username,$password,$db_name);


	if (isset($_POST['submit'])) {
		$productname=$_POST['pname'];
		$discount=$_POST['discount'];
		$productprice=$_POST['pprice'];
		$image = $_FILES['image']['name'];		
			$filename=$_FILES['image']['tmp_name'];
			$folder = "../assets/images/".$image;
			move_uploaded_file($filename, $folder);

		$insert_values = "insert into producttb(product_name, discount, product_price, product_image) values('$productname', '$discount', '$productprice', '$image')";
		if(mysqli_query($conn,$insert_values)){
			echo "success";
		}
		else{
			echo "insert error";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>insert product</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="text" name="pname" placeholder="name">
	<input type="text" name="discount" placeholder="discounted price">
	<input type="text" name="pprice" placeholder="price">
	<input type="file" name="image">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>