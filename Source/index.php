<?php
include("dbconnect.php");
session_start();
extract($_POST);

error_reporting(0);
if(isset($_POST['btn']))
{
$qrt=mysql_query("select * from admin where uname='$uname' && password='$password' && anumber='$anumber'");
$num1=mysql_num_rows($qrt);
if($num1==1)
{
header("location:admin.php");
}
$qry=mysql_query("select * from register where uname='$uname' && password='$password' && anumber='$anumber'");
$num=mysql_num_rows($qry);
if($num==1)
{
$qrt=mysql_fetch_array($qry);
$uid=$qrt['id'];
$_SESSION['uid']=$uid;
$d=rand(1000000,4000000);


$mobile=$qrt['pnumber'];

$msg='your login otp is '.$d;

  $sms_url = "http://sms.creativepoint.in/api/push.json?apikey=6555c521622c1&route=transsms&sender=FSSMSS&mobileno=$mobile&text=Dear%20customer%20your%20msg%20is%20$msg%20Sent%20By%20FSMSG%20FSSMSS";
    $sms_response = file_get_contents($sms_url);
  if ($sms_response) {
        // SMS sent successfully
        $rt = mysql_query("UPDATE register SET ot='$d' WHERE id='$uid'");
        if ($rt) {
            // Redirect after 5 seconds
            echo "<script>setTimeout(function(){ window.location.href = 'otp.php?uid=$uid'; }, 5000);</script>";
            echo "SMS sent successfully. Redirecting...";
            exit();
        } else {
            echo "Error updating OTP: " . mysql_error();
        }
    } else {
        echo "Error sending SMS";
    }

}
else
{
?>
<script language="javascript">
	alert("Username Password Wrong");
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
					<input placeholder="User Name" name="uname" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input  placeholder="Password" name="password" type="password" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input  placeholder="Aadhar number" name="anumber" type="password" required="">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					<div class="rem-w3">
			
						<div class="clear"></div>
					</div>
					<input type="submit" value="Login" name="btn">
					<div class="w3-head-continue">
						<h4><a href="register.php"> Sign up now »</a></h4>
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