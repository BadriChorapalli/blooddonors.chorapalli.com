<?php session_start(); ?>
<?php
include("database/dbconnect.php");
//if(isset($_SESSION['mobile'])&&$_POST['session']==$_SESSION['mobile']){
$mobile=$_SESSION['mobile'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$weight=$_POST['weight'];
$street=$_POST['street'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$bloodgroup=$_POST['bloodgroup'];
$ldb=$_POST['ldb'];
$reqtype=$_POST['reqType'];
$session=$_POST['session']; 
//echo $mobile;
$database= new dbConnect();
;
$insertQuery="INSERT INTO blooddonors.donor_data (DID, UID, NAME, GENDER, AGE, WEIGHT, LAT, LNG, IP_ADDRS, CREATE_DATE, UPD_DATE, SMS_COUNT,STREET,CITY,PINCODE,BLOODGROUP,MOBILE) VALUES (NULL, '', '$name', '$gender', '$age', '$weight', NULL, NULL, NULL, '', '', NULL,'$street','$city','$pincode','$bloodgroup','$mobile')";
echo $database->insertMysql($insertQuery);
//}
?>