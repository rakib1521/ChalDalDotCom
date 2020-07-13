<?php 
error_reporting(0);
include 'connection.php';
session_start();
$user_detail=$_SESSION['user_details'];
$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);

if (isset($_POST['Logout']) ) {
	unset($_SESSION['user_details']);
	$_SESSION['login_status']=0;
	header('Location: index.php');
}

if (isset($_POST['update_password'])) {
	$email=$_POST['email_input'];
	$password=$_POST['new_password'];
	$query="update user_info set password='$password' where email='$email'" ;
	$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			$sql="select * from user_info where email='$email' AND password='$password'";
			$command= mysqli_query($connection,$sql);
			$row_number=mysqli_num_rows($command);

			
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Failed")';
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

	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">   

	<link rel="stylesheet" type="text/css" href="css/personal_info.css">
</head>
<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>
	<!--information Display-->
	<?php  
		if ($row_number>0) {
			while ($user =mysqli_fetch_array($command)) {
				
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $user['name'] ?></h1>
						<div class="card-body">
							
							<h2 class="item-price">Delivery Address: <?php echo $user['address'] ?></h2>
							<h2 class="item-price">Contact number: <?php echo $user['phone_no'] ?></h2>
							<h2 class="item-price">Gender: <?php echo $user['gender'] ?></h2>
							<h2 class="item-price">E-mail: <?php echo $user['email'] ?></h2>
							
							
						</div>
						
					
					
					
				</div>
					<?php
			}
		}
			?>


			<!--Update password-->

	
		<div class="col-lg-6">

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Password</button>
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="container">
							<div class="row">

								<div class="col-lg-12">
									<div class="modal-header">
										<h4 class="modal-title">Update Password</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>

									</div>

								</div>
							</div>

						</div>

						
						<div class="modal-body">
							<form method="post"  >
								

									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="EmailInput">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email
												" name="email_input">
												<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>


										</div>
									</div>



									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="NameInput">Old Pasword</label>
												<input type="text" class="form-control" id="old_password" name="old_password">

											</div>


										</div>

									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="PhoneNoInput">New Password</label>
												<input type="text" class="form-control" id="new_password" name="new_password">

											</div>


										</div>
									</div>

								








									<center>
										<button type="submit" name="update_password" class="btn btn-primary">Submit</button>
									</center>
									

							


							</form>
						</div>

					</div>

				</div>
			</div>

		</div>










</div>



	
	


</body>
</html>