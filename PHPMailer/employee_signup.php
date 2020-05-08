<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
		

	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>

	<div class="input-group">
  	  <label>Contact_no</label>
  	  <input type="number" name="contact_no" value="<?php echo $contact_no; ?>">
  	</div>  

	
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="address" name="address" value="<?php echo $address; ?>">
  	</div>

	<div class="input-group">
  	  <label>Photo</label>
  	  <input type="file" name="photo" value="<?php echo $photo ?>" accept="image/*">
  	</div>

	
	<div class="input-group">
  	  <label>Email_id</label>
  	  <input type="email_id" name="email_id" value="<?php echo $email_id; ?>">
  	</div>	

	
	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	
	
	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password" value="<?php echo $password; ?>">
  	</div>
    <div class="input-group">
      <label>Experience</label>
      <input type="number" name="exp" value="<?php echo $exp; ?>">
    </div>

	<div class="input-group">	
    		<div class="dropdown">
      			<select name ="service">
        		<option value="">Service Capable</option>
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
            <option value="">Area Serviceable</option>
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
      <label>Pincode(Enter the pincode shown above for your area)</label>
      <input type="text" name="pincode" value="<?php echo $pincode; ?>">
    </div>




	

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>