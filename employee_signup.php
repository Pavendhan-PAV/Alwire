<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="css/onload.css" /> 
  <link href="https://fonts.googleapis.com/css?family=Coda+Caption:800|Lemonada|Work+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Rock+Salt&family=Sacramento&family=Tangerine&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
    <li class="men"><a href="index.php#two"><b>SERVICES</b></a></li>
    <li class="men"><a href="About_us.html"><b>ABOUT US</b></a></li>
    <li class="men"><a class="bttn" href="#popup1"><b>SIGN UP</b></a></li>
    <li class="men"><a class="bttn" href="#popup2"><b>LOG IN</b></a></li>
  </ul>
  </div>
  </div>

  <div class="log"> 
  <form method="post" action="employee_signup.php">
  	<?php include('errors.php'); ?>
		

	<div class="input-group">
  	  <label>name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>

	<div class="input-group">
  	  <label>contact_no</label>
  	  <input type="number" name="contact_no" value="<?php echo $contact_no; ?>">
  	</div>  

	
	<div class="input-group">
  	  <label>address</label>
  	  <input type="address" name="address" value="<?php echo $address; ?>">
  	</div>

	<div class="input-group">
      <label>Photo</label>
      <input type="file" name="photo" value="<?php echo $photo ?>" accept="image/*">
    </div>


	
	<div class="input-group">
  	  <label>email_id</label>
  	  <input type="email_id" name="email_id" value="<?php echo $email_id; ?>">
  	</div>	

	
	<div class="input-group">
  	  <label>username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	
	
	<div class="input-group">
  	  <label>password</label>
  	  <input type="text" name="password" value="<?php echo $password; ?>">
  	</div>
    <div class="input-group">
      <label>exp</label>
      <input type="number" name="exp" value="<?php echo $exp; ?>">
    </div>

	<div class="input-group">	
    		<div class="dropdown">
      			<select name ="service">
        		<option value="">service capable</option>
       			<option value="1001">Car Wash</option>
        		<option value="1002">Electrical / Circuits</option>  
      			<option value="1003">Housekeeping</option>
      		<option value="1004">Landscaping</option>
      		<option value="1005">Handyman & Carpenter</option>
      		<option value="1006">Landscaping</option>
      		<option value="1007">Pest Control</option>
      		<option value="1008">Plumbing</option>
      		<option value="1009">Rental property management</option>
      		<option value="1010">Repair retrofit & Renovations</option>
     			</select>
      
    		</div>
  	
  		  
  </div>
  


    <div class="input-group"> 
        <div class="dropdown">
            <select name ="area">
            <option value="">area serviceable</option>
            <option value="Tambaram">Tambaram-600045</option>
            <option value="Guindy">Guindy-600015</option>  
            <option value="Maduravoyal">Maduravoyal-600107</option>
            <option value="Tnagar">Tnagar</option>
            <option value="Koyambedu">Koyambedu</option>
            <option value="Perugalathur">Perugalathur</option>
            <option value="Chennaicentral">Chennaicentral</option>
          </select>
      
        </div>
  </div>
  
  <div class="input-group">
      <label>pincode(Enter the pincode shown above for your area)</label>
      <input type="text" name="pincode" value="<?php echo $pincode; ?>">
    </div>




	

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login_employee.php">Sign in</a>
  	</p>
  </form>
</body>
</html>