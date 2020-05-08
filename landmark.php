<?php

require_once "connect.php";


session_start();

$username=$_SESSION["username"];

$sql="SELECT * FROM customer where username='$username' ";
$result=mysqli_query($customer,$sql);

if(mysqli_num_rows($result) > 0)
{

while($row=mysqli_fetch_array($result))
{
	$name=($row['NAME']);
	$contact=($row['CONTACT']);
	$pincode=($row['PINCODE']);
	$address=($row['ADDRESS']);
	$customer_email=($row['EMAIL']);
}


}
?>