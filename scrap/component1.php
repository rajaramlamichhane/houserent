<?php
				$servername = "localhost";
				$username= "root";
				$password="";
				$db_name="newdb";

				$conn = mysqli_connect($servername,$username,$password,$db_name);
				$sql = "SELECT * FROM producttb";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result)>0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$name = $row['product_name'];
						$price = $row['product_price'];
						$image = $row['product_image'];
						$productid = $row['id'];
						
						echo '<div class="col-md-3 col-sm-6 my-3 my-0">
							<form action="" method="post">
								<div class="card shadow">
									<div>';
										echo'<img src = "assets/images/$image" alt="image not available" class="img-fluid card-img-top">';
										echo '

									</div>
									<div class="card-body">
										<h5 class="card-title">';
										echo $name;
										echo '</h5>
										<h6>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										</h6>
										<p class="card-text">
											some quick example text to build on the card. 
										</p>
										<h5>
											<small><s class="text-secondary">$519</s></small>
											<span class="price">';
											echo "$".$price; 
											echo '</span>
										</h5>
										<button type="submit" class="btn btn-warning my-3" name="add">Add to cart <i class="fas fa-shopping-cart"></i></button>
										<input type="hidden" name="product_id" value="$productid">

									</div>
								</div>
							</form>				
						</div>';
						
						
					}	
				}
			?>