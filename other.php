<?php 
  include 'connection.php';
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Other</title>
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
	<!--Navbar-->
	<?php include 'navbar.php'; ?>
	<!--Sort&Search-->
	<div class="sort_search">
		<div class="container">
			<form method="POST">
				<div class="row">
			<div class="col-lg-11">
				<div class="col-lg-6">
					<select class="custom-select" name="SORT_BY">
					<option value="0">SORT BY</option>
					<option value="1">Price LOW to High</option>
					<option value="2">Price HIGH TO LOW</option>

				</select>
				</div>
				
				
			</div>
			<div class="col-lg-1">
				<button type="submit" class="btn btn-primary">Sort</button>
				
			</div>
		</div>
			</form>
			
		</div>
		
	</div>

	<!--item start-->

	<?php 
	
	$sort=0;
	
	if (isset($_POST['SORT_BY'])) {
		$sort=$_POST['SORT_BY'];
	}
	
	
	if ($sort==1) {
		$query = "select * from item_information  where Catagory=6 order by Price ASC" ;
	} else if ($sort==2) {
		$query = "select * from item_information where Catagory=6 order by Price DESC" ;
	} else if($sort==0) {
		$query = "select * from item_information where Catagory=6 order by Id ASC" ;
	}
	
	
	
	

	$command= mysqli_query($connection,$query);
	$row_number=mysqli_num_rows($command);
	?>
	<div class="row">
		<?php  
		if ($row_number>0) {
			while ($item =mysqli_fetch_array($command)) {
				
				
				?>

				<div class="col-lg-3">
					<form method="post">
						<h6 class="card-title"><?php echo $item['Name'] ?></h6>
						<div class="card-body">
							<img src="images/<?php echo $item['Image']  ?>" class="img-fluid rounded-circle">
							<h2 class="item-price">Price: <?php echo $item['Price'] ?></h2>
							
							<input type="hidden" name="hidden_Id" value="<?php echo $item["Id"]; ?>"/>
							<input type="hidden" name="hidden_name" value="<?php echo $item["Name"]; ?>"/>
							<input type="hidden" name="hidden_price" value="<?php echo $item["Price"]; ?>"/>
							
							<input type="text" class="form-control" name="ammount" value="1" />
							<input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart"/>
							
						</div>
						
					</form>
					
					
				</div>
				
				
				
				



				<?php
			}
			?>
		</div>
		<?php  

	}

	?>
	<!--Adding in Cart-->
	<?php 
      
      if (isset($_POST["add_to_cart"])) {
      	
      			
      	if (isset($_SESSION["cart"])) {
      		$item_array_id = array_column($_SESSION["cart"], 0);
      		
      		

      		if (!in_array($_POST["hidden_Id"], $item_array_id)) {
      			
      			$count= count($_SESSION["cart"]);
      			
      			$item_array=array(

      			$id= $_POST["hidden_Id"],
      			$name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

      		);
      			$_SESSION["cart"][$count]=$item_array;
      			

      		} else {
      			echo '<script language="javascript">';
				echo 'alert("Already Added")';
				echo '</script>';
      			
      		}

      		
      		
      	} else {
      		$item_array=array(

      			$id= $_POST["hidden_Id"],
      			$name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

      		);
      		$_SESSION["cart"][0]=$item_array;
      	}
      	
      	
      	
      }

      


	 ?>
	


</body>
</html>