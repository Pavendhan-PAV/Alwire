
<!DOCTYPE html>
<html>
<head>
	<title>Redirect</title>
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
          <a class="dn" id="emp" href="employee_signup.php">EMPLOYEE</a>
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
		<li class="men"><a href="index.php#two"><b>SERVICES</b></a></li>
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
			

	echo("Your information has been successfully registered.Please wait while we redirect you to login page");
header("refresh:5;url=login_customer.php");
?></h4>
	
	</div>
</body>
</html>