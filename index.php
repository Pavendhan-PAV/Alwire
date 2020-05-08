<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>ALWIRE</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/font-awesome.min.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<script type="text/javascript">
     	function check(){	
     		$(document).ready(function() {
        		$('html, body').hide();
				if (window.location.hash) {
            		setTimeout(function() {
                		$('html, body').scrollTop(0).show();
               			$('html, body').animate({
                    		scrollTop: $(window.location.hash).offset().top
                    	}, 100)
            		}, 0);
        		}
       			 else {
            		$('html, body').show();
        		}
    		});
    	}	
</script>
	</head>
	<body id="top">

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

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="index.php">ALWIRE</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#elements" onclick="document.getElementById('two').scrollIntoView({ behavior: 'smooth', block: 'start' });">Services</a></li>
						<li><a href="About_us.html">About Us</a></li>
						<?php
						if(isset($_SESSION['username']))
						{
							?><li><a class="button special" class="bttn" href="customer_dashboard.php" ><?php echo($_SESSION['username'])?></a></li><?php

						}
						else if(isset($_SESSION['username2']))
						{
							?><li><a class="button special" class="bttn" href="employee_dashboard.php" ><?php echo($_SESSION['username2'])?></a></li><?php

						}
						else
						{?>
						<li><a class="button special" class="bttn" href="#popup1" >Sign Up</a></li>
						<li><a href="#popup2" class="button special" class="bttn">Login</a></li><?php
					}?>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>ALWIRE</h2>
					<p>Always Within Reach</p>
					<ul class="actions">
						<li><a href="#popup1" class="button big special" class="bttn">Sign Up</a></li>
						<li><a href="complaint_register.php" class="button big special" class="bttn">Register Complaint</a></li>
						<li><a href="#elements" class="button big alt" onclick="document.getElementById('two').scrollIntoView({ behavior: 'smooth', block: 'start' });" >Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>WHAT WE DO?</h2>
					<p>In this new era of technology we bring in every possible House Services.</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="icon fa-refresh major"></i>
								<h3>GENERAL</h3>
								<p>Services like Housekeeping, Plumbing and General Facilities.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-area-chart major"></i>
								<h3>TECHNICAL</h3>
								<p>Services like Electrical lines, Circuits & wide range of Electrical Appliances.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-cog major"></i>
								<h3>CUSTOM</h3>
								<p>Services like Webdev, Registration & Management.</p>
							</section>
						</div>
					</div>
				</div>
			</section>
			
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<header class="major">
					<h2>GENERAL SERVIVES</h2>
					<p>Everybody's needs & wants</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special">
								<img src="images/cleaning.jpg" style="display: block; width: 100%; border-radius: 6px;" alt="" /><br>
								<h3>HOUSE KEEPING</h3>
								<p>Cleaning and arrangement is necessary for both Health and Mind. Nothing to worry about. We come with high quality equipment & service. </p>
								<li>Cleaning</li>
								<li>Plumbing</li>
								<li>Pest Control</li>
							</section>
						</div>
						<div class="6u">
							<section class="special">
								<img src="images/cook.jpg" style="display: block; width: 100%; border-radius: 6px;" height="243.038" alt="" /><br>
								<h3>FOR YOUR PERSONAL</h3>
								<p>Our surrounding though healthy it's important that we dress with perfect clean clothes, eat healthy food, etc.</p>
								<li>Cooking</li>
								<li>Laundry & Dry Cleaning</li>
								<li>Babysitting</li>
								<li>Car Wash</li>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Three -->
	<section id="two" class="wrapper style2" style="background: #fff;">
				<header class="major">
					<h2 style="color: #666f77;">TECHNICAL SERVIVES</h2>
					<p style="color: #555f66">Everybody's needs & wants</p>
				</header>
				<div class="container">
					<div class="row" style="color: #555f66">
						<div class="6u">
							<section class="special" style="color: #555f66">
								<img src="images/elec.jpg" style="display: block; width: 100%; border-radius: 6px;" height="261.138" alt="" /><br>
								<h3 style="color: #666f77;">ELECTRICAL NEEDS</h3>
								<p>Any appliance, any circuit , any problem in your lines, Nothing to worry about. We come with high quality equipment & service. </p>
								<li>Circuits</li>
								<li>Appliances (eg. TV, Fridge)</li>
								<li>Fuse</li>
							</section>
						</div>
						<div class="6u">
							<section class="special">
								<img src="images/tech.jpg" style="display: block; width: 100%; border-radius: 6px;"  alt="" /><br>
								<h3 style="color: #666f77;">TECHNICALS FOUR YOUR HOUSE</h3>
								<p>Repairs using house Blue print and simple design isn't enough. The best of best who understand the very foundation can give the best from their arsenal.</p>
								<li>Handyman & Carpenter</li>
								<li>Landscaping</li>
								<li>Repair Retrofits & Renovations</li>
							</section>
						</div>
					</div>
				</div>
			</section>
		
		<!--Four -->

		<section id="two" class="wrapper style2">
				<header class="major">
					<h2>CUSTOM SERVIVES</h2>
					<p>Unique Services</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special">
								<img src="images/cust.jpg" style="display: block; width: 100%; border-radius: 6px;" alt="" /><br>
								<h3>MANAGEMENT & INFORMATION SHARING</h3>
								<p>Several custom idea services that you will definetly need help for.</p>
								<li>Rental Property Management</li>
								<li>Tax Management</li>
								<li>Tutorial classes</li>
							</section>
						</div>
						<div class="6u">
							<section class="special">
								<img src="images/cook.jpg" style="display: block; width: 100%; border-radius: 6px;" height="243.038" alt="" /><br>
								<h3>FOR YOUR PERSONAL</h3>
								<p>Our surrounding though healthy it's important that we dress with perfect clean clothes, eat healthy food, etc.</p>
								<li>Cooking</li>
								<li>Laundry & Dry Cleaning</li>
								<li>Babysitting</li>
								<li>Car Wash</li>
							</section>
						</div>
					</div>
				</div>
			</section>
			
		
	</body>
</html>