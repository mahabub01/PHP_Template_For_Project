<?php
/**
* EmailVerification Class
*/
class EmailVerification 
{
	
	public static function sendEmail($toemail,$sendmessage)
	{
		 $to = $toemail;
		 $subject = "Registration Verification Email";
		 $message = $sendmessage;
		 $email ="madeeasyframework@gmail.com";
		 $header ="From:$email";
		 $send =mail($to,$subject,$message,$header);
	}


}

?>