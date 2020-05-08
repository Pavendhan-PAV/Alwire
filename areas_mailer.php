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
$mail->AddReplyTo($_SESSION['cus_emailid']);
$mail->AddAddress($_SESSION['cus_emailid']);
$mail->Subject = "AVAIL NOW";
$mail->WordWrap   = 80;

$cust_name= $_SESSION['cus_name'];
$dept_name= $_SESSION['dept_name'];

$content ="
<html>
<body>
AVAIL NOW!:<br><br>
___________________________________________________________________<br>

Dear '$cust_name' ,<br>
	We are happy to inform that your Default address is now available for our service :'$dept_name'<br>



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
