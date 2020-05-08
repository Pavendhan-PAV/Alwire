<?php

	require_once "connect.php";
	session_start();
	if(isset($_POST["name"]))
	{
		$employee=mysqli_connect("127.0.0.1","root","","employee");
		$pincode=$_SESSION['pin'];
		$sql="SELECT * from area where pincode='$pincode'";
		
		$result=mysqli_query($employee,$sql);
		
		if(mysqli_num_rows($result)>0)
		{
			$service=1;
		}
		else
		{
			$service=0;
		}
		
		$user=$_POST["username"];
		$sql="SELECT * from customer where username like '$user'";
			//$sql = "SELECT username FROM customer  WHERE username=\"".$_POST["username"]."\"";
			
			$query = $pdo->query($sql);
			
			if(!$query->fetch(PDO::FETCH_ASSOC))
			{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$contact=$_POST['contact'];
				$address=$_POST['address'];
				$landmark=$_POST['landmark'];
				$city=$_POST['city'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$insert="INSERT INTO customer(NAME,EMAIL,CONTACT,ADDRESS,AREA,CITY,PINCODE,USERNAME,PASSWORD,SERVICEABLE) values('$name','$email','$contact','$address','$landmark','$city','$pincode','$username','$password','$service') ";
				
				$pdo->query($insert);

				header("Location: loginredirect.php");
				return;
			}
			else
			{
				$_SESSION["error"] = "error";
			}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<script type="text/javascript">
		var submitted=false;
	</script>
</head>
	<link rel="stylesheet" type="text/css" href="css/formin.css">
	<link rel="stylesheet" href="css/onload.css" />
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
	

	<div class="reg">
		
		<form   method="POST">
		<input type="text" placeholder="Name" required="" style="color: #1b1b1b; text-transform: capitalize;" name="name"><br><br>
		<input type="Email" placeholder="Email id" required="" style="color: #1b1b1b;" name="email"><br><br>
		<input type="tel" placeholder="Contact" required="" style="color: #1b1b1b;" pattern="[0-9]{10}" name="contact"><br><br>
		<textarea placeholder="Address" required="" rows="2" cols="15" style="text-transform: capitalize;" name="address"></textarea><br><br>
		<input type="text" placeholder="City" required="" style="color: #1b1b1b;" name="city"><br><br>
		<input type="text" placeholder="AREA" style="color: #1b1b1b;" name="landmark"><br><br>
		
		
	<input type="text" placeholder="Enter a username" required="" style="color: #1b1b1b;" name="username"><br><br>
		<div class="error">		
			<?php
				if(isset($_SESSION["error"]))
				{
					echo 'USERNAME ALREADY EXISTS<br />';
					unset($_SESSION["error"]);
				}
			?>
		</div>
		<input type="password" placeholder="Enter a password" required="" style="color: #1b1b1b;" name="password">
		
  		<input type="submit" name="submit" value="Register">
	</form></div>
</body>
</html>
