<?php


session_start();

if(isset($_SESSION['password'],$_SESSION['name'])){
echo "";

}
else
header("location:login.php?notallowed");


?>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('travel_agency');



if(isset($_POST['submit'])){
	
	
	

	
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$c=$_POST['c_id'];
	$phone=$_POST['phone'];
	
	
	
	
	$int="insert into travel_agency(t_id,name,address,phone,contract_customer_id)
	values('NULL','$name','$address','$phone','$c')";
	
	
	
	
	$show= mysql_query($int,$conn) or die(mysql_error());
	if($show){

		echo "<script>window.onload = function(){alert('You have been added a Record Successfully!');}</script>";
		
		}

		else
		echo "<script>window.onload = function(){alert('Something went wrong please try again!');}</script>";
	
}











?>

<!DOCTYPE html>
<html>
<head>

		<title>TRAVEL AGENCY ADDING</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="booking/css/booking.css">
	
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>

		
	
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
<style type="text/css">
	a{
		text-decoration: none;
	}
	a:hover{
		text-decoration: none;
	}
</style>

	
</head>

<body  style="background-color: #f6f6f6;">
<div class="container">
<div style="padding: 10%;"></div>
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-11">
		<table class="table table-condensed">
			<tr>
				<form action="" method="post">
				<th>Name:</th>
				<td><input type="text" name="name" placeholder="Enter Travel Agency Name" required pattern="[a-zA-Z\s]{1,}" title="Name contains only letters"></input></td>
				<th>Address:</th>
				<td><input type="text" name="address" placeholder="Enter the Address" required pattern="[a-zA-Z0-9\s]{1,}" title="Address contains only letters and digits"></input></td>
			</tr>
			<tr>
				
				
				<th>Phone Number:</th>
				<td><input type="text" name="phone" placeholder="Enter your Phone number" required pattern="[0-9]{8,}" title="Phone number contains only digits"></input></td>
				<th>Contract Customer ID:</th>
				<td><input type="text" name="c_id" placeholder="Enter Customer's ID"  required pattern='[0-9]{1,}' title="Must contain only digits" ></input></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="submit" value="Add Record" class="btn btn-success btn-lg btn-block"></input></td>
				<td><input type="reset"  value="Clear" class="btn btn-info btn-lg btn-block"></input></td>
				<td><a href="our_team.php" class="btn btn-primary btn-lg btn-block">Back to Settings</a></input></td>
			</tr></form>
		</table></div>


		
	</div>
</div>

</body>
</html>