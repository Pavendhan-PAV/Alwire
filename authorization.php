<?php
session_start();
require_once "connect.php";

$authorization_signup="alwire:employee_signup";
$authorization_update="alwire:complaint_update";

if($_POST['CODE']==$authorization_update)
{

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

  $select="UPDATE complaint_call SET status=1 where empid='$empid'";
  $result=mysqli_query($employee,$select);

  $select="UPDATE employee SET current_status=0 where empid='$empid'";
$result=mysqli_query($employee,$select);
unset($_SESSION['errac']);

header("Location:employee_dashboard.php");




  }
}

else if($_POST['CODE']==$authorization_signup)
{
unset($_SESSION['errac']);
header("Location:employee_signup.php");
}
else
{
$_SESSION['errac']=1;
header("Location:update_call.php");
}
?>