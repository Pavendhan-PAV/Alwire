<?php

require_once "PHPMailer/class.phpmailer.php";
require_once "PHPMailer/class.smtp.php";
//require_once "PHPMailer/PHPMailerAutoload";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tsl";
$mail->Port     = 587;  
$mail->Username = "alwire2020solutions@gmail.com";
$mail->Password = "veetlairukom";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("alwire2020solutions@gmail.com", "alwire");
$mail->AddReplyTo($_SESSION['emp_emailid']);
$mail->AddAddress($_SESSION['emp_emailid']);
$mail->Subject = "you have got some work to do ! \n pack up dude";
$mail->WordWrap   = 80;
$empl_name=$_SESSION['emp_name'];
$empl_email=$_SESSION['emp_emailid'];

$cust_name= $_SESSION['customer_name'];
$cust_ph_no=$_SESSION['customer_ph_no'];
$cust_address=$_SESSION['customer_address'];
$cust_problem=$_SESSION['customer_problem'];
$cust_email=$_SESSION['customer_emailid'];

$content ="
<html>
<body>
DUTY CALLS!:<br><br>
___________________________________________________________________<br>

Dear '$empl_name' ,<br>
	You have received a new complaint. Please find the details of the Complaint  below.<br>

<br>
CUSTOMER NAME:'$cust_name'<br>
CUSTOMER PHNO:'$cust_ph_no'<br>
CUSTOMER EMAIL:'$cust_email'<br>
CUSTOMER PROBLEM:'$cust_problem'<br>
CUSTOMER ADDRESS:'$cust_address'<br>
<br>

Thanks,<br>
ALWIRE<br>
____________________________________________________________________<br>

</body>
</html>"  ;


 $mail->MsgHTML($content);

$mail->IsHTML(true);
if(!$mail->Send()) 
{//echo "Problem sending email.";
}
else 
{//echo "email sent.";
}
?>
