<?php
$email_to = "badri@chorapalli.com,badri.for.u@gmail.com,pickdhana@gmail.com"; // Replace this with your email address
$fromEmail="badri@chorapalli.com";
$success_message = "Thanks  for comments"; // This is an example message. Replace with your own.
$site_name = "Chorapalli"; // Replace this with your website name.

$g_name = $_REQUEST['name'];
$comment = $_REQUEST['comment'];
$email = $_REQUEST['email'];
		$subject = ' Feedback from '.$g_name;
		$body = "$comment \n From".$email;
		
		$headers = 'From: ' . $site_name . ' <' . $email . '> ' . "\r\n" . 'Reply-To: ' . $email;
	mail($email_to, $subject, $body, $headers);
		
		echo '<span class="success_notice">' . $success_message . '</span>';
	
?>