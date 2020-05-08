
<!DOCTYPE html>
<html>
<head>
	<title>Services Form</title>
	<script type="text/javascript">
		var submitted=false;
	</script>
</head>
	<link rel="stylesheet" type="text/css" href="formin.css">
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
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
		<li class="men"><a href=""><b>CONTACTS</b></a></li>
		</div>
		<form action="https://www.google.com" target="_blank" method="get">
		<li style="float:right"><input id="search" type="text" placeholder="Search">
		<li class=button>
		<button type="submit"><i class="fa fa-search"></i></button>
	</li></li></form>
	</ul>
	</div>
	</div>
	
	<div class="reg">
		
		<form action="areacheck.php"  form  method="POST">
			<?php
			echo"<tr>";
		echo"<td>"; echo("Please Enter your Pincode to check whether your area is serviceable"); echo"</td>";

		echo"<td>";?><input type="tel" placeholder="PINCODE" required="" style="color: #1b1b1b;" pattern="[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}" name="PINCODE">
			<?php echo"</td>";
		
  		echo"<td>"; ?><input type="submit" name="submit" value="Register"><?php echo"</td>";
  		echo"</tr>"; ?>
	</form></div> 
</body>
</html>