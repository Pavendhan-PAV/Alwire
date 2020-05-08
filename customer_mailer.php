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
$mail->SetFrom("alwire2020solutions@gmail.com");
$mail->AddReplyTo($_SESSION['customer_emailid']);
$mail->AddAddress($_SESSION['customer_emailid']);
$mail->Subject = "alwire is there for you";
$mail->WordWrap   = 100;
$empl_name=$_SESSION['emp_name'];
$cust_name= $_SESSION['customer_name'];

$empl_ph_no=$_SESSION['emp_ph_no'];
$cust_email=$_SESSION['customer_emailid'];
$empl_photo=$_SESSION['emp_photo'];

$content="<html>
<body>
Registration Confirmation:<br><br>
___________________________________________________________________<br>
CUSTOMER_NAME: '$cust_name'<br>

Email: '$cust_email'<br>

Dear '$cust_name',
	Thank you for choosing our services.This mail is regarding the 
confirmation of your complaint.Our Executives will reach you with in an hour.Please find the details of the Employee who will be reaching out to you below.<br>

<br>
EMPLOYEE NAME:'$empl_name'<br>
EMPLOYEE PHNO:'$empl_ph_no'<br>

<br>

Thanks,<br>
ALWIRE<br>
____________________________________________________________________<br>

</body>
</html>"; 
  $mail->MsgHTML($content);

//$mail->addStringAttachment($_SESSION['emp_photo']);
//$mail->AddAttachment($_SESSION['emp_photo']);
$mail->IsHTML(true);
if(!$mail->Send()) 
{echo "Problem sending email.";}
else 
echo "The Employee Details have been sent to your mail.Please reach out to us at alwire2020solutions@gmail.com for further assistance";
?>

