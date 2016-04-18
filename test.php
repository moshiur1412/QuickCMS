<?php
require("PHPMailer_5.2.0/class.phpmailer.php");
require("PHPMailer_5.2.0/class.smtp.php");
$mail = new PHPMailer();

$mail->IsSMTP();

$mail->SMTPSecure = "ssl";
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 465;

//https://www.google.com/settings/security/lesssecureapps (Access for mail login )
$mail->SMTPAuth = true;     
$mail->Username = "your_mail@gmail.com";  
$mail->Password = "your_password"; 


$mail->From = "info@test.com";
$mail->FromName = "PHPMailer Testing Process";

$mail->AddAddress("to_mail@gmail.com");                 


$mail->WordWrap = 50;                               

$mail->IsHTML(true);

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>