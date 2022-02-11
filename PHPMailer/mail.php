<?php
require("class.PHPMailer.php");
/*
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "10.194.23.193";  // specify main and backup server
$mail->SMTPAuth = false;     // turn on SMTP authentication
$mail->Username = "smb_mis.pet@ph.yazaki.com";  // SMTP username
$mail->Password = "P3tSupp0rt"; // SMTP password

$mail->From = "willem.leonardo@ph.yazaki.com";
$mail->FromName = "Your Conscience";
$mail->AddAddress("rommel.bacus@ph.yazaki.com");
$mail->AddAddress("willem.leonardo@ph.yazaki.com", "Information");
$mail->AddReplyTo("aaron.sarreal@ph.yazaki.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->AddAttachment("images/icon.png");         // add attachments
//$mail->AddAttachment("/images/phpmailer.gif", "new.gif");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body in bold!";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. 
";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";*/

$mail = new PHPMailer();
/*
$mail->SMTPDebug = 1;
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "10.194.23.193";  // specify main and backup server
//$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "smb_mis.pet@ph.yazaki.com";  // SMTP username
$mail->Password = "P3tSupp0rt"; // SMTP password
*/

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = '10.194.23.193';
$mail->SMTPAuth = true;
$mail->Port = 25;
//$mail->Port = 587;
$mail->Username = 'smb_mis.pet@ph.yazaki.com';
$mail->Password = 'P3tSupp0rt';
$mail->SMTPSecure = 'tls';


$mail->From = "jasper.labenia@ph.yazaki.com";
$mail->FromName = "Your Conscience";
$mail->AddAddress("rommel.bacus@ph.yazaki.com");
$mail->AddAddress("willem.leonardo@ph.yazaki.com", "Information");
$mail->AddReplyTo("aaron.sarreal@ph.yazaki.com", "Information");
$mail->AddAddress("aaron.sarreal@ph.yazaki.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->AddAttachment("images/icon.png");         // add attachments
//$mail->AddAttachment("/images/phpmailer.gif", "new.gif");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "IDOL";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. 
";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>