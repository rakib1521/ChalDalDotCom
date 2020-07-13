<?php 
include 'connection.php';
session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Info Display</title>
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

<link rel="stylesheet" type="text/css" href="css/Vegetables.css"> 
	
</head>
<body>
	<?php include 'navbar.php'; ?>

	<center><h2>Your Information</h2></center>
	<?php 



	
	

	if (isset($_POST['Confirm'])) {



		$name= $_SESSION['name'];
		$phone_no=$_SESSION['phone_no'];
		$address= $_SESSION['address'];
		$gender= $_SESSION['gender'];
		$email= $_SESSION['email'];
		$password= $_SESSION['password'];


		if ($gender==1) {
			$gender_i= " Male";
		}
		else{
			$gender_i= "Female";
		}
		$sql="insert into user_info (name,phone_no,address,gender,email,password) VALUES('$name',$phone_no,'$address','$gender_i','$email','$password')";

		if (!mysqli_query($connection,$sql)) {
			echo "Something went wrong";
		}
		else
		{
			echo "Registration Successful ";
			$_SESSION['login_status']=1;
			$user_detail=array($email,$password);
			$_SESSION['user_details']=$user_detail;
			header('Location: personal_info.php');
		}






	}
	else{
		$name= $_SESSION['name'];
		$phone_no=$_SESSION['phone_no'];
		$address= $_SESSION['address'];
		$gender= $_SESSION['gender'];
		$email= $_SESSION['email'];
		$password= $_SESSION['password'];
	}




	?>
	
		
		<table class="table table-striped table-dark">
		<thead>
			<tr>

				<th scope="col">Name</th>
				<th scope="col"><?php echo "$name"; ?></th>

			</tr>
		</thead>
		<tbody>
			<tr>

				<td>Phone Number</td>
				<td><?php echo " $phone_no";  ?></td>

			</tr>
			<tr>

				<td>Address</td>
				<td><?php echo "$address"; ?></td>

			</tr>
			<tr>

				<td>Gender</td>
				<td><?php 
				if ($gender==1) {
					echo " Male";
				}
				else{
					echo "Female";
				}

				?></td>

			</tr>

			<tr>

				<td>Email</td>
				<td><?php echo "$email"; ?></td>

			</tr>

			<tr>

				<td>Password</td>
				<td><?php echo "$password"; ?></td>

			</tr>
		</tbody>
	</table>

	<form method="POST">
		<button type="submit" class="btn btn-primary" name="Confirm">Confirm</button>

	</form>

	


	
	
</body>
</html>