<?php 

include 'connection.php';
session_start();

$user_detail=$_SESSION['user_details'];
$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);




if (isset($_POST['confirm_order'])) {

	foreach ($_SESSION["cart"] as $key => $value) {
		$date = date('Y-m-d h:i:s');
		
		$product_name=$value[1];
	
		$product_price=$value[2];
	
		$id=$_SESSION['id'][0];
		$ammount=$value[3];
		
	
	$query="INSERT INTO order_history (product_name,Product_price,buy_time,user_id,ammount)
				VALUES ('$product_name',$product_price,'$date',$id,$ammount)"; 
	$command= mysqli_query($connection,$query);
			}
	unset($_SESSION["cart"]);
	header("Location: cart_view.php");
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Personal info</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">   

	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>


	<div class="container">
	<?php  
		if ($row_number>0) {
			while ($item =mysqli_fetch_array($command)) {
					$_SESSION['id']=$item['id'];
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $item['name'] ?></h1>
						<div class="card-body">

							<?php 
							if (isset($_POST['address_change_btn'])) {
								?>
								<h2 class="item-price">Delivery Address: <?php echo $_POST['address_input'] ?></h2>


								<?php 
							} else {
								?>
								<h2 class="item-price">Delivery Address: <?php echo $item['address'] ?></h2>
								<?php 
							}
							


							 ?>
							
							
							<h2 class="item-price">Contact number: <?php echo $item['phone_no'] ?></h2>
							
							
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#address_change">Change Address</button>
								<div class="modal fade" id="address_change" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="container">
												<div class="row">

													<div class="col-lg-12">
														<div class="modal-header">
															<h4 class="modal-title">New Address</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>

														</div>

													</div>
												</div>

											</div>


											<div class="modal-body">
												<form method="post"  >
													<div class="container">
														
														<div class="row">
															<div class="col-lg-12">
																<div class="form-group">
																	<label for="AddressInput">Address</label>
																	<input type="text" class="form-control" id="address_input" name="address_input">

																</div>


															</div>

														</div>


											
														<button type="submit" name="address_change_btn" class="btn btn-primary">Submit</button>

													</div>


												</form>
											</div>

										</div>

									</div>
								</div>
							</div>

						
					
					
					
				</div>
					<?php
			}
		}
			?>

	


	<!--order item Showing-->
	
	<table class="table table-striped table-dark">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">ammount</th>
				<th scope="col">total</th>

			</tr>
		</thead>
		<tbody>
			<tr>

				<?php 

				$total=0;

				foreach ($_SESSION["cart"] as $key => $value) {
					?>	
					<td><?php echo $value["1"]; ?></td>
					<td><?php echo $value["2"]; ?></td>
					<td><?php echo $value["3"]; ?></td>
					<td><?php echo $value["2"]*$value["3"]; ?></td>
					
					
					
				</tr>
				<?php 
				$total+=$value["2"]*$value["3"];
			}
			?>

			<tr>
				<td>total</td>
				<td><?php echo $total; ?></td>
			</tr>






		</tbody>
	</table>

	
	<form method="POST">
		<button type="submit" name="confirm_order" class="btn btn-primary btn-lg">Confirm</button>
	</form>


	



	
	


</body>
</html>