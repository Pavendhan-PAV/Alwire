<?php
session_start();


if(isset($_SESSION['username']))
{
	$_SESSION['complaint']=1;
	header("Location: complaint.php");

}
else
{
	$_SESSION['complaint']=0;
	header("Location: login_customer.php");
}



?>