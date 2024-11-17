<?php
include("dbconnect.php");
session_start();
extract($_POST);


$uid=$_GET['uid'];
error_reporting(0);
if(isset($_POST['btn']))
{

$qry=mysql_query("select * from register where id='$uid'");

$row=mysql_fetch_array($qry);

 $ot=$row['ot'];


if($ot==$otp){



header("location:home/home.php");

              }
else
{
?>
<script language="javascript">
	alert("otp Wrong");
	window.location.href="index.php";
	</script>
	<?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Social Nettwork</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Branded Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- //online-fonts -->

</head>
<body>
<div class="w3-agile-banner">
	<div class="center-container">
			<div class="main-content-agile">
			<div class="wthree-pro">
				<h2>Login</h2>
			</div>
			<br>
			<div class="sub-main-w3">	
				<form action="#" method="post" name="form1">
					<input placeholder="Enter otp" name='otp' type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				
					<div class="rem-w3">
			
						<div class="clear"></div>
					</div>
					<input type="submit" value="Login" name="btn">
					<div class="w3-head-continue">
					
				  </div>
				</form>
			</div>
		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2019 Login Form. All rights reserved | Design by Admin</p>
	  </div>
		<!--//footer-->
	</div>
</div>
</body>
</html>