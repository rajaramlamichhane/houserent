<?php
	echo "
		<link rel = 'stylesheet' href='assets/css/area.css' type='text/css'>
		<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='bootstrap/js/bootstrap.min.js'></script> 
		<script src='bootbox.min.js'></script>

	";
		
		$select = "select * from houseinfo where status = 1";
		$result=mysqli_query($conn,$select) or die("Select Query Error");
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<div class = 'both'><table cellspacing= 5px>";
			$hid=$row['h_id'];
			
			foreach($row as $key=>$value)
			{	
				if($key == "image")
				{
					echo "<div class = 'img'>";
					$image = $row['image'];
					echo "<img src='assets/images/$image' alt='Image is not available'/>";
					echo "</div>";
				}
				else
				{
					echo "<div class = 'content'>";
					echo "<tr><th>$key:</th><td>$value['h_id']</td></tr>";	
				}
			}		
		echo "</table>";?>
		<div class = 'content'>
			<form method= 'post' action = ''>
				<br/>
				<a href="logout.php ?>">logout</a>
				<a onclick='javascript:confirmationBook($(this));return false;' href="delete_owner.php?hid=<?php echo $value['h_id'];  ?>">Book</a>

			</form>
		</div>
		<br/>
		
		<?php echo "</div>"; ?>		
<?php
		echo "</div>";
		}
	
?>
 













 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='bootstrap/js/bootstrap.min.js'></script> 
	<script src='bootbox.min.js'></script>
</head>
<body>
<?php
	session_start();
	 
	include 'header.php';
	include 'db_connect.php';
?>	
		<?php
						
			$sql_view_owners = "SELECT * FROM houseinfo where status = 1";
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
		<table>
						
			<?php foreach($view_customer as $value) { ?>
			<tr>			
				<td><?php echo $key : $value['h_id']; ?><br>
				<?php echo $value['location']; ?><br>
				<?php echo $value['room_type']; ?><br>	
				<?php echo $value['price']; ?><br>
				<?php echo $value['phone']; ?><br>
				
				<td class="img"><?php echo $value['image']; ?></td>
			</tr>
			<tr>
				<td>
					<a onclick='javascript:confirmationBook($(this));return false;' href="booked_data.php?h_id=<?php echo $value['h_id'];  ?>"> <button>Book</button></a>
					<a href="logout.php">logout</a>
				</td>
			</tr>
			<?php } ?>
		</table>


 		<script type="text/javascript">
			function confirmationBook(anchor)
			{
			   var conf = confirm('Are you sure want to book this record?');
			   if(conf)
			      window.location=anchor.attr("href");
			}
		</script>
</body>
</html>
<?php include 'footer1.php'?>