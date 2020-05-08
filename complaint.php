<?php

	require_once "connect.php";
	session_start();
	$_SESSION['done']=0;

	if(isset($_SESSION["username"]))
	{
		$username = $_SESSION["username"];
		$sql = "SELECT * FROM customer WHERE username=\"".$username."\"";
		$query = $pdo->query($sql);		
		
		if($query)
		{
			$row = $query->fetch(PDO::FETCH_ASSOC);
		}

	}
	else{
		header('location: logerr.php');
		return;
	}
	
	if(isset($_POST["addchoice"]))
	{
		$_SESSION["service"]=$_POST["service"];
		$_SESSION["problem"]=$_POST["problem"];
		
		if($_POST["addchoice"]== "default")
		{
			$_SESSION["address"]=$row["ADDRESS"];
		}
		else
		{
			$_SESSION["address"]=$_POST["address"];
		}
		
		header("Location: ty.php");
		return;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Services Form</title>
	<script type="text/javascript">
		var submitted=false;
	</script>
</head>
	<link rel="stylesheet" type="text/css" href="css/complaint.css">
	<link rel="stylesheet" href="css/onload.css" /> 
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
  <div id="popup1" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="customer_dashboard.php">DASHBOARD</a>
          <a class="dn" id="emp" href="logout.php">LOGOUT</a>
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
		<li class="men"><a class="bttn" href="#popup1"><b><?php echo($_SESSION['username']);?></b></a></li>
		
		</div>
	</ul>
	</div>
	</div>
	<div id="info"><br />
	<?php
	if(isset($_SESSION["username"]))
	{
		echo '<br /><div id="Nm">Welcome <strong>'.$row['NAME'].'</strong>,</div><br />';
		echo 'Logged in successfully.<br /><br />';	
			
	}
?>
</div>
	<div class="reg" id="comp">
		<form action=ty.php method="POST">

			<select id="Service" required="" style="color: #1b1b1b;" name="Service">
  			<option value="">Select Service</option>
  			<option value="1001">Car Wash</option>
  			<option value="1002">Electrical / Circuits</option>
  			<option value="1003">Handyman & Carpenter</option>
  			<option value="1004">Housekeeping</option>
  			<option value="1005">Landscaping</option>
  			<option value="1006">Laundry & Dry cleaning</option>
  			<option value="1007">Pest Control</option>
  			<option value="1008">Plumbing</option>
  			<option value="1009">Rental property management</option>
  			<option value="1010">Repair retrofits & Rennovations</option>
  		</select>
  		<textarea placeholder="Problem in Detail" rows="3" cols="15" style="text-transform: capitalize;" name="problem"></textarea><br><br>
  		<div id="Choose">
  		<strong>Choose your address:</strong><br><br>

  		 <?php

if($row['SERVICEABLE']!=0)

{
	?><strong>DEFAULT ADDRESS:</strong><br><br>
	<input type="radio" onclick="bor1()" name="addchoice" value="0"><br><?php echo '<div id="def">'.$row['ADDRESS'].'</div>'; ?>
	
		<input type="radio" name="addchoice" value="1">
		<strong>NEW ADDRESS:</strong><br><br>
		<?php
		echo("<strong id='yay'>Please Enter your PINCODE to check whether your area is serviceable:</strong><br><br>");?>
		<input type="tel" placeholder="PINCODE"  style="color: #1b1b1b;" pattern="[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}" name="PINCODE"></p>
		<textarea id="new" placeholder="Enter new address" rows="3" cols="15" style="text-transform: capitalize;" name="address"></textarea>
		

<?php

}

else
{
		echo("Your default address is not serviceable yet.<p>You can register your complaints for other address(if serviceable and if any) ")?>
		<input type="radio" name="addchoice" value="1">
		<strong>NEW ADDRESS:</strong><br><br>
		<?php
		echo("<strong id='yay'>Please Enter your PINCODE to check whether your area is serviceable</strong><br><br>");?>
		<input type="tel" placeholder="PINCODE" required="" style="color: #1b1b1b;" pattern="[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}" name="PINCODE"></p>
		
		<textarea placeholder="Enter new address" rows="3" cols="15" style="text-transform: capitalize;" name="address"></textarea></p>
		
		<?php
}?>
		<input type="submit"><br><br>
		</form></div>
	</div>
</body>
</html>