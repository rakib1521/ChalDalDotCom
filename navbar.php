<?php 
include 'connection.php';




if (isset($_POST['Login'])) {

$email= $_POST['email_input'];
$password= md5($_POST['password_input']);
$user_detail=array($email,$password);
$_SESSION['user_details']=$user_detail;


$sql="select * from user_info where email='$user_detail[0]' AND password='$user_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);
if ($row_number==1 && $_SESSION['login_status']!=1 ) {
	echo "Login Successful";
	$_SESSION['login_status']=1;
	header('Location: personal_info.php');


} else {
	echo '<script language="javascript">';
	echo 'alert("Wrong UserName & Password Combination")';
	echo '</script>';
}

}
if (isset($_POST['submit'])) {
	
	$_SESSION['name']= $_POST['name_input'];
	$_SESSION['phone_no']= $_POST['phone_input'];
	$_SESSION['address']= $_POST['address_input'];
	$_SESSION['gender']= $_POST['gender_input'];
	$_SESSION['email']= $_POST['email_input'];
	$_SESSION['password']= $_POST['password_input'];

	header('Location: info_display.php');

	}

	if (isset($_POST['Logout']) ) {
	unset($_SESSION['user_details']);
	$_SESSION['login_status']=0;
	header('Location: index.php');
}
	
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	<a class="navbar-brand" href="index.php">ChalDalDotCom</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="personal_info.php">Profile</a>
          <a class="dropdown-item" href="contact_us.php">Contact Us</a>
          <a class="dropdown-item" href="orderdetail.php">Orders</a>
        </div>
      </li>


		</ul>
		<form class="form-inline my-2 my-lg-0" id="search">
			<input class="form-control mr-lg-4" type="search" placeholder="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



		</form>
		
		<form class="form-inline my-2 my-lg-0"  method="POST">
			<input class="form-control mr-sm-2" type="User Name" name="email_input" placeholder="User Name">
			<input class="form-control mr-sm-2" type="password" name="password_input" placeholder="Password">
			<button class="btn btn-outline-success my-2 my-sm-0" name="Login" type="submit">Login</button>


		</form>

		<form class="form-inline my-2 my-lg-0" method="POST" >
				<button class="btn btn-outline-success my-2 my-sm-0" name="Logout" type="submit">Logout</button>



			</form>

		<a class="navbar-brand" href="cart_view.php">
           <img src="images/cart.png" class="cart_image" width="30" height="30" >
        </a>



	</div>
</nav>
</body>
</html>