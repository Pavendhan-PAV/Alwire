<?php
session_start();

	require_once "landmark.php";
if($_POST['addchoice']==1)
	{$address=$_POST['address'];
$pincode=$_POST['PINCODE'];
}
$problem=$_POST['problem'];
$y=$_POST['Service'];

$employee=mysqli_connect("127.0.0.1","root","","employee");


$checkpin="SELECT * from area where pincode='$pincode'";
$check=mysqli_query($employee,$checkpin);




if(@mysqli_num_rows($check)>0)

{


$sql="SELECT * FROM employee INNER JOIN area on area.empid=employee.empid having area.pincode='$pincode' and area.deptid='$y' and employee.current_status=0 limit 0,1";

$result=mysqli_query($employee,$sql);

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Thank You!</title>
</head>
	<link rel="stylesheet" href="css/onload.css" />
	<link rel="stylesheet" type="text/css" href="css/ty.css">
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
	<div class="thx">
		<h3>Thank you for response and time</h3>
		<h4>
			<?php 

			if($_SESSION['done']!=1)

{
	if(@mysqli_num_rows($check)>0)
{
			if(@mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_array($result))
{echo "OUR EMPLOYEE MR.";

echo($row['name']);echo(" will take care of this complaint.");
echo ("Contact no: ");
echo($row['contact no']);
?>
<?php
echo '<img height="300" width="300" src="data:image;base64,'.$row['photo'].' "><br /><hr /><br />';
?>
<?php echo"</td>";

echo "</tr>"; 
$id=$row['empid'];

$update="UPDATE employee SET current_status='1' WHERE empid='$id'";

$employee->query($update);

$_SESSION['emp_emailid']=$row['email'];
$_SESSION['emp_name']=$row['name'];
$_SESSION['emp_ph_no']=$row['contact no'];
$_SESSION['emp_photo']=$row['photo'];

$_SESSION['customer_emailid']=$customer_email;
$_SESSION['customer_name']=$name;
$_SESSION['customer_ph_no']=$contact;
$_SESSION['customer_address']=$address;
$_SESSION['customer_problem']=$problem;


$select_order="SELECT * FROM complaint_call order by complaint_number desc limit 0,1";
$result_order = mysqli_query($employee,$select_order);

 while($ids=mysqli_fetch_array($result_order))
  {
$orderid=$ids['complaint_number']+1;

  }





$insert="INSERT INTO complaint_call(empid,customer_name,contact_no,address,problem,complaint_number) values('$id','$name','$contact','$address','$problem','$orderid')";

$employee->query($insert);


$_SESSION['done']=1;

if ( isset($_SESSION['emp_emailid'])) {
	 	require_once("employee_mailer.php");
	}
	 if ( isset($_SESSION['customer_emailid'])) { 	
	 	require_once("customer_mailer.php");
	 }
}


}

else
{
	echo ("Sorry for the incovenience caused.Currently no employees.");

$_SESSION['done']=1;
}
	
	
}//our if
else
{
echo("Sorry your new address/pincode is not serviceable.Please check if any information wrong and try again(if)");
$_SESSION['done']=1;
}


}//session
else
{
	echo("You have already tried to register.Please visit our home or our complaint page to register further.");
}

		?></h4>
		<a id="Home" href="index.php">Return Home</a>
	</div>
</body>
</html>
<?php 
	
	

 ?>