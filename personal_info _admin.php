<?php 
error_reporting(0);
include 'connection.php';
session_start();
$admin_detail=$_SESSION['admin_details'];
$sql="select * from admin_info where email='$admin_detail[0]' AND password='$admin_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);

if (isset($_POST['Logout']) ) {
	unset($_SESSION['admin_details']);
	$_SESSION['admin_login_status']=0;
	header('Location: admin.php');
}

if (isset($_POST['update_password'])) {
	$email=$_POST['email_input'];
	$password=$_POST['new_password'];
	$query="update admin_info set password='$password' where email='$email'" ;
	$command= mysqli_query($connection,$query);
		if (mysqli_query($connection,$query)) {
			
			echo '<script language="javascript">';
			echo 'alert("Updated")';
			echo '</script>';
			$sql="select * from admin_info where email='$email' AND password='$password'";
			$command= mysqli_query($connection,$sql);
			$row_number=mysqli_num_rows($command);
			$_SESSION['login_status']=1;

			
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

	<link rel="stylesheet" type="text/css" href="css/personal_info.css">
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="admin_function.php">ChalDalDotCom<span class="sr-only">(current)</span></a>
				</li>


			</ul>
			<form class="form-inline my-2 my-lg-0" id="search">
				<input class="form-control mr-lg-4" type="search" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



			</form>
			
				
				

			<form class="form-inline my-2 my-lg-0" method="POST" >
				<button class="btn btn-outline-success my-2 my-sm-0" name="Logout" type="submit">Logout</button>



			</form>

			
			
			


		</div>
	</nav>

	<!--information Display-->
	<?php  
		if ($row_number>0) {
			while ($admin =mysqli_fetch_array($command)) {
				
				
				?>
				<div class="col-lg-9">
					
						<h1 class="card-title"><?php echo $admin['name'] ?></h1>
						<div class="card-body">
							
							<h2 class="item-price">Delivery Address: <?php echo $admin['address'] ?></h2>
							<h2 class="item-price">Contact number: <?php echo $admin['phone_no'] ?></h2>
							<h2 class="item-price">Gender: <?php echo $admin['gender'] ?></h2>
							<h2 class="item-price">E-mail: <?php echo $admin['email'] ?></h2>
							
							
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