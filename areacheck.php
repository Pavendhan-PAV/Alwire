<?php
session_start();
$employee=mysqli_connect("127.0.0.1","root","","employee");
$pincode=$_POST['PINCODE'];
$_SESSION['pin']=$pincode;

$sql="SELECT * from area where pincode='$pincode'";
$result=mysqli_query($employee,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Validity</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/ty.css">
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	 <div id="popup1" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="signup2.php">USER</a>
          <a class="dn" id="emp" href="update_call.php">EMPLOYEE</a>
        </div>
    </div>
  </div>

  <div id="popup2" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="login_customer.php">USER</a>
          <a class="dn" id="emp" href="login_employee.php">EMPLOYEE</a>
        </div>
    </div>
  </div>  
	<div id="name">
		<h1>Alwire</h1>
		<h2>(Always Within Reach)</h2>
	</div>
	<div class="menu">
	<ul id="menuitems">
		<div id="listitems">
		<li class="men"><a href="index.php"><b>HOME</b></a></li>
		<li class="men"><a href="complaint_register.php"><b>SERVICES</b></a></li>
		<li class="men"><a href="About_us.html"><b>ABOUT US</b></a></li>
		<li class="men"><a class="bttn" href="#popup1"><b>SIGN UP</b></a></li>
		<li class="men"><a class="bttn" href="#popup2"><b>LOG IN</b></a></li>
		
		</div>
		
	</ul>
	</div>
	</div>
	<div class="thx">
		<h3>Thank you for your response and time</h3>
		<h4><?php 
			if(@@mysqli_num_rows($result)>0)
{
	echo("Your pincode is Available for service.Please wait while we redirect you to the signup page.");
header("refresh:5;url=signup_form_customer.php");
?><p><a id="redirect" href="signup_form_customer.php">Click here if not redirected within 5 seconds!</a></p><?php
}
else
{
	echo("Sorry.Currently your area is not serviceable but you can still join with us by providing your details and we will intimate you when we are  available.If you would like to join,Click on the link below");?>
	<p>
	<a id="redirect" href="signup_form_customer.php">Signup_Form</a></p><?php
}
		?></h4>
	
	</div>
</body>
</html>