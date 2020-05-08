<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Services Form</title>
	<script type="text/javascript">
		var submitted=false;
	</script>
</head>
	<link rel="stylesheet" type="text/css" href="css/formin.css">
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
		 <div id="popup1" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="employee_dashboard.php">DASHBOARD</a>
          <a class="dn" id="emp" href="logout_emp.php">LOGOUT</a>
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
		<li class="men"><a href=""><b>CONTACTS</b></a></li>
		<li class="men"><a class="bttn" href="#popup1"><b><?php echo($_SESSION['username2']);?></b></a></li>
		
		</div>
		
	</ul>
	</div>
	</div>
	
	<div class="reg">
		
		<form action="authorization.php"  form  method="POST">
			<?php
			
		echo("Please Enter your authorization code"); ?><p><?php 
  if(isset($_SESSION['errac'])){echo("Wrong code! or You have not signed in as an employee!");unset($_SESSION['errac']);}
		?></p>
		<input type="tel" placeholder="CODE" required="" style="color: #1b1b1b;"  name="CODE">
			<input type="submit" name="submit" value="Register">
	</form></div> 
</body>
</html>