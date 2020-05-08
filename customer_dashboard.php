<?php
  session_start();
  require_once "connect.php";
   if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: logerr.php');
    return;
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login_customer.php");
    return;
  }
  if(isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM customer WHERE username=\"".$username."\"";

    $query = $pdo->query($sql);   
    
    if($query)
    {
      $row = $query->fetch(PDO::FETCH_ASSOC);
    }
$customer_name=$row['NAME'];

  $select="SELECT * from complaint_call where customer_name='$customer_name' ";
  $result=mysqli_query($employee,$select);




  






  
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
     <?php  if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
     
    <?php endif ?><?php

   if(@mysqli_num_rows($result)>0)
   {
    
   echo"<table border='1'>
   <tr>
   <th>Complaint No</th>
   <th>Employee Name</th>
   <th>Employee Contact No</th>
   <th>Complaint Status </th>
   </tr>";
while($rows=mysqli_fetch_array($result))
{echo"<tr>";
  echo"<td>";echo($rows['complaint_number']);echo"</td>";

$empid=$rows['empid'];

$select2="SELECT * FROM employee where empid=$empid ";
$result2=mysqli_query($employee,$select2);

while($rows2=mysqli_fetch_array($result2))
{
  echo"<td>";echo($rows2['name']);echo"</td>";
  echo"<td>";echo($rows2['contact no']);echo"</td>";
}
if($rows['status']=='0')
 {echo"<td>";echo("Pending");echo"</td>";}
else
  {echo"<td>";echo("Pending");echo"</td>";}




  
  


echo"</tr>";

}
echo "</table>";

 ?> <p>
     Want To Register for our Service again? <a href="complaint_register.php"><strong><h4>Register!</h4></strong></a>
    </p>
    <?php


   }
   else
   {
    echo("Welcome $customer_name.Register for your services to see your complaints here!");
?> <p>
     Want To Register for our Service?  <a href="complaint_register.php"><strong><h4>Register!</h4></strong></a>
    </p>
    <?php

   }
 }
 else
 { 
  echo("Please log in first!");

 }






   ?>
  
  </div>
</body>
</html>