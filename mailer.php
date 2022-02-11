<?php
require("PHPMailer/class.PHPMailer.php");

function php_mail($message,$subject,$attachement,$to,$from,$header_urgent)
{
	$mail = new PHPMailer();


//$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = '10.194.23.193';
$mail->SMTPAuth = false;
if($header_urgent != "")
{
	$mail->Priority = $header_urgent;
}

//$mail->Port = 25;
//$mail->Port = 587;
$mail->Username = 'smb_mis.pet@ph.yazaki.com';
$mail->Password = 'P3tSupp0rt';
//$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);        
	if(count($to) > 0 )
	{
		for($i = 0 ;$i <= count($to)-1; $i++)
		{
			$mail->AddAddress($to[$i]);
		}
	}	
	if(count($attachement) > 0 )
	{
		for($i = 0 ;$i <= count($attachement)-1; $i++)
		{
			$mail->AddAttachment($attachement[$i]);
		}
	}
	$mail->AddReplyTo("smb_mis.pet@ph.yazaki.com");
	$mail->FromName = $from;
	$mail->From = "smb_mis.pet@ph.yazaki.com";
	$mail->Subject = $subject;
	$mail->Body    = $message;
		
		if(!$mail->Send())
		{
		   echo "Message could not be sent. 
		";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}

		echo "Message has been sent";
	

}

?>