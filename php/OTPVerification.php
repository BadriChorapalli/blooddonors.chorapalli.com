<?php session_start(); ?>
<?php
include("database/dbconnect.php");
if(isset($_SESSION['mobile'])){
$mobile=$_SESSION['mobile'];
$reqtype=$_POST['reqType'];
$otp=$_POST['otp'];
$checkQuery="SELECT * FROM  user_otp WHERE MOBILE = '$mobile' AND OTP =$otp";
$database= new dbConnect();
$value=$database->checkValue($checkQuery);
if($value>0){
$updateQuery="UPDATE user_otp SET VALID = 'Y' WHERE MOBILE = '$mobile' AND OTP =$otp";
echo "$mobile:".$database->updateMysql($updateQuery);
}else{
echo "$mobile:false";
}

}

?>