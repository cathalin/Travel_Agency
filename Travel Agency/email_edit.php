<?php


session_start();
$r= $_SESSION['password'];
$e= $_SESSION['name'];

if(isset($r,$e)){
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


if(isset($_GET['id'])){
	$b=$_GET['id'];
	$test="select fullname,email_address,subject,body from customer_emails where customer_email_id='$b'";
	$show=mysql_query($test,$conn);
	$na=mysql_fetch_assoc($show);
	}
if(isset($_POST['submit'])){
	
	
	

	
	
	$name=$_POST['fullname'];
	
	$email=$_POST['email'];
	
	$subject=$_POST['subject'];
	$body=$_POST['body'];
	
	$int="update customer_emails set fullname='$name',email_address='$email',subject='$subject',body='$body' where customer_email_id='$b'";
	
	$show= mysql_query($int,$conn) or die(mysql_error());
	if($show){

		echo "<script>window.onload = function(){alert('You have been updated a Record Successfully!');}</script>";
		}

		else
		echo "<script>window.onload = function(){alert('Something went wrong please try again!');}</script>";
	
}

 ?>


 <!DOCTYPE html>
<html>
<head>

		<title>EMAIL EDITING</title>
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
				
				<th>Fullname:</th>
				<td><input type="text" name="fullname" placeholder="Enter your Firstname"  value="<?php echo $na['fullname']; ?>" required pattern="[a-zA-Z\s]{1,}" title="Firstname contains only letters"></input></td>
				<th>Email Address:</th>
				<td><input type="email" name="email" value="<?php echo $na['email_address']; ?>"  placeholder="name@example.com" required></input></td>
			</tr>
			<tr>
				
				<th>Subject:</th>
				<td><input type="text" name="subject" placeholder="Subject:"  value="<?php echo $na['subject']; ?>" required></input></td>
				<th>Message:</th>
				<td><textarea cols="40" name="body" placeholder='Message:'><?php echo $na['body']; ?></textarea></td>
			</tr>
			<tr>
				
				
			<tr>
				<td><input type="submit" name="submit" value="Save Changes" class="btn btn-success btn-lg btn-block"></input></td>
				
				<td><a href="customer_emails.php" class="btn btn-primary btn-lg btn-block">Back to Settings</a></input></td>
			</tr></form>
		</table></div>


		
	</div>
</div>




</body></html>