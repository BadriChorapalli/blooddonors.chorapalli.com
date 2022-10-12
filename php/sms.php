<?php
//Please Enter Your Details
$user=""; //your username
$password=""; //your password
$mobilenumbers=$_REQUEST['mobile'];; //enter Mobile numbers comma seperated
$message = $_REQUEST['message'];; //enter Your Message
//$message = "Dear Member,Your One Time Password is ".$random_number." Please use this for mobile verification.-Blood Donors";
$senderid="NETFSH"; //Your senderid

$url="http://bulksms.nettyfish.com/SMS_API/sendsms.php";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&mobile=$mobilenumbers&message=$message&sendername=$senderid");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); // execute
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
echo $curlresponse; //echo "Message Sent Succesfully" ;
}
?>
