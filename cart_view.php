<?php 
error_reporting(0);
include 'connection.php';
session_start();
if (isset($_POST['place_order'])) {
	if ($_SESSION["login_status"]==1) {
		header('Location: order.php');
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Please Login")';
		echo '</script>';
	}
}

if (isset($_POST['remove'])) {
		$item_id = $_POST["hidden_id"];

	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if($val[0] == $item_id)
			{
				unset($_SESSION["cart"][$select]);
				header('Locarion:cart_view.php');
			}
		}
	}
	}
	if (isset($_POST['Login'])) {

	$email= $_POST['email_input'];
	$password= $_POST['password_input'];
	$user_detail=array($email,$password);
	$_SESSION['user_details']=$user_detail;

	$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";
		$command= mysqli_query($connection,$sql);
	$row_number=mysqli_num_rows($command);
	if ($row_number==1 && $_SESSION['login_status']==0 ) {
	echo "Login Successful";
	$_SESSION['login_status']=1;
	header('Location: order.php');


} else {
	echo '<script language="javascript">';
	echo 'alert("Wrong UserName & Password Combination")';
	echo '</script>';
}

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

	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">

	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">   

	

	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>


	<!--Cart item Showing-->
	<div class="row cart_show">
		<div class="table-show col-lg-9 ">
			<table class="table table-striped  ">
		<thead>
			<tr>
				<th scope="col">Image</th>
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
					$query ="select Image from item_information  where Id='$value[0]'" ;
					$command= mysqli_query($connection,$query);
					$row_number=mysqli_num_rows($command);
					if ($row_number>0) {
					while ($item =mysqli_fetch_array($command)) {
					?>
					<td><img src="images/<?php echo $item['Image']  ?>" class="img-fluid rounded-circle product_image"></td>	
					<?php 
						}
					}
					 ?>
					<td><?php echo $value["1"]; ?></td>
					<td><?php echo $value["2"]; ?></td>
					<td><?php echo $value["3"]; ?></td>
					<td><?php echo $value["2"]*$value["3"]; ?></td>
					<td><form method="post">
						<input type="hidden" name="hidden_id" value="<?php echo $value["0"]; ?>"/>
						<button type="submit" name="remove" class="btn btn-primary btn-sm">Remove</button>
					</form></td>
					
					
				</tr>
				<?php 
				$total+=$value["2"]*$value["3"];
			}
			?>

			






		</tbody>
	</table>

		</div>

		<div class="total-price col-lg-3">
			<tr class="total_price_display">
				<td> <b>total</b></td>
				<td><?php echo $total; ?></td>
			</tr>
		<form method="POST">
		<button type="submit" name="place_order" class="btn btn-primary btn-lg place_order">Place Order</button>
		</form>
		</div>
		
	</div>
	
	
	
	

	



	
	


</body>
</html>