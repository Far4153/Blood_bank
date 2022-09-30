<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail= new PHPMailer();
$mail->SMTPDebug = 2 ;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->SMTPSecure="tls";
$mail->Port=587;
$mail->Username="your@gmail.com";
$mail->Password="pwd";
$to="to@gmail.com";

$mail->Subject='test subject';
$mail->setFrom('your@gmail.com','BLOOD BANK');
$mail->isHTML(true);
$mail->Body="";
$mail->addAddress($to);

if($mail->send())
{
    echo "Email sent successfully";
}
else
{
    echo " mail failed to send";
}
$mail->smtpClose();
?>