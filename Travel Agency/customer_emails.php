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


$test=("SELECT customer_email_id,fullname,email_address,subject,body from customer_emails");
$result=mysql_query($test,$conn);
$name=mysql_fetch_assoc($result);





?>









<!DOCTYPE html>
<html>
<head>

		<title>CUSTOMERS' EMAIL INFORMATION</title>
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


	
</head>

<body  style="background-color: #f6f6f6;">

<?php echo "<html><head><link rel='stylesheet' href='css/bootstrap/css/bootstrap.min.css'>
<link rel='stylesheet' href='css/bootstrap/css/bootstrap.css'></head>

<body>
<div class='container'>
<div class='row'>
<div class='col-12'><center><h1 class='alert alert-success' style='margin-top:2%'>Welcome To Customer Emails Information Page</h1></center>


</div>

</div>



<div class='container'>
<div class='row'>
<div class='col-md-11'><input style='width:100%;height:40px;' type='search'  name='search' placeholder='Search...'></input></div>

<div class='col-md-1'><input style='width:100%;height:40px;' type='image' class='alert alert-success' name='searchh' src='icon/search.png'></input></div>
</div>
</div></div>
<div class='container'>
<br><br>
<div class='row'>

<table class='table table-bordered'><tr><th>ID:</th><th>Fullname:</th><th>Email:</th><th>Subject:<th>Body:</th><th>Delete:</th><th>Edit:</th>

</tr>";
do{
	
	echo "<tr class='success'>";
	echo "<td class='success'>".$name['customer_email_id']."</td>";
	echo "<td>".$name['fullname']."</td>";
	echo "<td>".$name['email_address']."</td>";

	echo "<td>".$name['subject']."</td>";
	echo "<td><textarea cols='40' rows='2' style='margin-left:20%;'>".$name['body']."</textarea></td>";
	
	echo "<td>"."<a href='email_delete.php?id=".$name['customer_email_id']."'><img  style='margin-left:30%;' src='icon/delete.png' width='16' height='16' />"."</a>"."</td>";
	
	echo "<td>"."<a href='email_edit.php?id=".$name['customer_email_id']."'><img src='icon/edit.png'  style='margin-left:30%;' width='16' height='16' />"."</a>"."</td>";
	
	
	
	
	
	
}while($name=mysql_fetch_assoc($result));
echo "</table></div></div></div></body></html>";





?>
	


</body>


</html>