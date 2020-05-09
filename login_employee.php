<?php include('server.php') 
?>
<!DOCTYPE html>
<html>
<head>
   <title>Employee Login</title>
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
          <a class="dn" id="emp" href="employee_signup.php">EMPLOYEE</a>
        </div>
    </div>
  </div>

  <div id="popup2" class="overlay">
    <div class="popup">
      <a class="close" href="#">&times;</a>
        <div class="content">
          <a class="dn" id="us" href="login.php">USER</a>
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
    <li class="men"><a href="index.html"><b>HOME</b></a></li>
    <li class="men"><a href="index.html#two"><b>SERVICES</b></a></li>
    <li class="men"><a href="About_us.html"><b>ABOUT US</b></a></li>
    <li class="men"><a class="bttn" href="#popup1"><b>SIGN UP</b></a></li>
    <li class="men"><a class="bttn" href="#popup2"><b>LOG IN</b></a></li>
  </ul>
  </div>
  </div>

   <div class="log">
   
  <form method="post" action="login_employee.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <input type="submit" value="Log in" name="login_user">
    </div>
    <p id="Choose">
      Not yet a member?<br /> <a id="chin" href="update_call.php">Sign up</a>
    </p>
  </form>
</body>
</html>