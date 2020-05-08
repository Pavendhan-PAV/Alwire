<?php
  session_start();
  require_once "connect.php";
   if (!isset($_SESSION['username2'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: logerr.php');
    return;
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username2']);
    header("location: login_employee.php");
    return;
  }
  if(isset($_SESSION['username2']))
  {
    $username = $_SESSION['username2'];
    $sql = "SELECT * FROM employee WHERE username=\"".$username."\"";
    $query = $pdo2->query($sql);   
    
    if($query)
    {
      $row = $query->fetch(PDO::FETCH_ASSOC);
    }
$empid=$row['empid'];
  $select="SELECT * from complaint_call where empid='$empid' and status=0 ";
  $result=mysqli_query($employee,$select);




  }






  
?>


<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/ty.css">
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
          <a class="dn" id="us" href="employee_dashboard.php">DASHBOARD</a>
          <a class="dn" id="emp" href="logout_emp.php">LOGOUT</a>
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
    <li class="men"><a class="bttn" href="#popup1"><b><?php echo($_SESSION['username2']);?></b></a></li>
    
    </div>
  </ul>
  </div>
  </div>
   <?php

?>
  <div class="thx">
   <?php
  if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
     <?php  if (isset($_SESSION['username2'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username2']; ?></strong></p>
      <p> <a href="logout_emp" id="redirect" style="color: red;">logout</a> </p>
    <?php endif ?><?php

   if(mysqli_num_rows($result)>0)
   {
     ?><h4> Pending complaints</h4><?php
   echo"<table border='1'>
   <tr>
   <th>Customer Name</th>
   <th>Contact No</th>
   <th>Address</th>
   <th>Problem Description</th>
   </tr>";
while($rows=mysqli_fetch_array($result))
{echo"<tr>";
  echo"<td>";echo($rows['customer_name']);echo"</td>";
  echo"<td>";echo($rows['contact_no']);echo"</td>";
  echo"<td>";echo($rows['address']);echo"</td>";
   echo"<td>";echo($rows['problem']);echo"</td>";


echo"</tr>";

}
echo "</table>";

 ?> <p>
     Completed your complaint_call? <a href="update_call.php">Update Here</a>
    </p>
    <?php


   }
   else
   {
    echo("Currently there are no complaints pending for you.Please wait while we update your status.");


   }






   ?>
  
  </div>
</body>
</html>