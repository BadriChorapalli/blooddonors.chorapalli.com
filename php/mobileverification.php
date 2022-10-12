<?php session_start(); ?>

<?php
include("database/dbconnect.php");
$reqtype=$_POST['reqType'];
$mobile=$_POST['mobile'];
$_SESSION['mobile']=$mobile;
$mysqltime = date ("Y-m-d H:i:s"); 
$random_number = intval( rand(1,9) . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); 
$insertQuery="INSERT INTO user_otp (MOBILE,OTP,VALID,DATE) VALUES ( '$mobile', '$random_number', 'N', '$mysqltime')";
$message = "Dear Member,Your One Time Password is ".$random_number." Please use this for mobile verification.-Blood Donors";
$database= new dbConnect();
echo $database->insertMysql($insertQuery);
$site_name="Chorapalli";
$email_to = "badri@chorapalli.com,badri.for.u@gmail.com,pickdhana@gmail.com";
$subject = 'OTP :-'.$random_number;
		$body =$message. " \n Send  Message to ".$mobile ;
		
		$headers = 'From: ' . $site_name . ' <' . $email_to . '> ' . "\r\n" . 'Reply-To: ' . $email_to;
	mail($email_to, $subject, $body, $headers);

?>

<?php
//Please Enter Your Details
$user="muthugtti"; //your username
$password="muthu123"; //your password
 //enter Mobile numbers comma seperated
//$message = $_REQUEST['message'];; //enter Your Message
$mobilenumbers="91".$mobile;
$senderid="NETFSH"; //Your senderid
/*
$url="http://bulksms.nettyfish.com/SMS_API/sendsms.php";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&mobile=$mobilenumbers&message=$message&sendername=$senderid");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);*/
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");

/*$curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error happened
die(curl_error($ch));
curl_close($ch); // close cURL handler
} else {
$info = curl_getinfo($ch);
curl_close($ch); // close cURL handler
//echo "";
echo $curlresponse; //echo "Message Sent Succesfully" ;*/

}
?>