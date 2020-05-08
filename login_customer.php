<?PHP

	require_once "connect.php";
	session_start();


	if(isset($_POST["username"]) && isset($_POST["password"]) && !isset($_SESSION['username2'] ) )
	{
		
		
		$username = $_POST["username"];
		$sql = "SELECT password FROM customer WHERE username='$username'";
		$query = $pdo->query($sql);
	
		if($query)
		{
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if($row['password']==$_POST["password"])
			{
				$_SESSION["username"]=$_POST["username"];
				if(isset($_SESSION['complaint'] ))
				{header("Location: complaint.php");
		return;}
			else
{
	header("Location:customer_dashboard.php");
		return;
}
				
			}
			else
			{
				$_SESSION["pwerror"] = "INVALID PASSWORD";
				$_SESSION['log']=0;
			}
		}
		else
		{
			$_SESSION["pwerror"] = "INVALID USERNAME";
			
		}
	}
	else
	{
		if(isset($_SESSION['username2'] ))
		$_SESSION["pwerror"] = "You have Already signed in as an Employee.Please log out and log in as customer if you want to file a complaint.";
	}

?>

<html>
<head>
	<title>User Login</title>
	<script type="text/javascript">
		var submitted=false;
	</script>
</head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="css/onload.css" />	
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

 <div id="popup1" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="customer_signup.php">USER</a>
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
		<li class="men"><a href=""><b>CONTACTS</b></a></li>
		<li class="men"><a class="bttn" href="#popup1"><b>SIGN UP</b></a></li>
		<li class="men"><a class="bttn" href="#popup2"><b>LOG IN</b></a></li>

				
		
	</ul>
	</div>
	</div>
	
	<p><br><br></p>
<?php
	if(isset($_SESSION["pwerror"]))
	{
		echo $_SESSION["pwerror"];
		unset($_SESSION["pwerror"]);
		echo '<br /><br />';
	}
	if(isset($_SESSION['username'])&& !isset($_SESSION['username2'] ) && isset($_SESSION['complaint'] ) )
	{
		header("Location:complaint.php");
	}
	else if(isset($_SESSION['username'])&& !isset($_SESSION['username2'] ) && !isset($_SESSION['complaint'] ) )
	{
		header("Location:customer_dashboard.php");
	}
	else
	{

?>	<div class="log">
	
	<form  method="POST">
		<h4><?php
	if(isset($_SESSION['complaint']))
		{if(($_SESSION['complaint'])=='0')
		{echo("You Have to login before you can register our service:");}
	}

	?></h4>
		<input type="text" placeholder="USERNAME"  style="color: #1b1b1b; text-transform: capitalize;" required="" name="username">
		<input type="password" placeholder="PASSWORD" required="" name="password">
		<input type="submit" value="Log in"> 

	</form></div>
	<?php
}?>
</body>
</html>