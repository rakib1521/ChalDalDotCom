<?php 
include 'connection.php';
session_start();



if (isset($_POST['Login'])) {

$email= $_POST['email_input'];
$password= md5($_POST['password_input']);
echo $password;
$admin_detail=array($email,$password);
$_SESSION['admin_details']=$admin_detail;

$sql="select * from admin_info where email='$admin_detail[0]' AND password='$admin_detail[1]'";
$command= mysqli_query($connection,$sql);
$row_number=mysqli_num_rows($command);
if ($row_number==1 && $_SESSION['admin_login_status']!=1 ) {
    echo "Login Successful";
    $_SESSION['admin_login_status']=1;
    header('Location: admin_function.php');


} else {
    echo '<script language="javascript">';
    echo 'alert("Wrong adminName & Password Combination")';
    echo '</script>';
}

}

    
     ?>


<html>
<head>
    <title> Admin Login </title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">   
</head>
    <body>
    <div class="login-box">
    <img src="images/avatar.png" class="avatar">
        <h1>Login Here</h1>
            <form method="post">
            <p>Admin Name</p>
            <input type="text" name="email_input" placeholder="Enter admin Name">
            <p>Password</p>
            <input type="password" name="password_input" placeholder="Enter Password">
            <input type="submit" name="Login" value="Login">
             
            </form>
        
        
        </div>
    
    </body>
</html>