<?php
/*
	author: istockphp.com
*/
require_once("include/dbconnect.php"); // require the db connection

/* catch the post data from ajax */
//$fname = $_POST['fname']; 
//$lname = $_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];

if (isset($_POST["varcode"]) && !empty($_POST["varcode"])){
$varcode=$_POST['varcode'];
//******CHECK VAR_CODE********
	$emailquery=mysqli_query($con,"select Userid,Email,Name,Password,Status,vr_code from user where Email='".$email."' AND Password=SHA('".$password."') AND vr_code='".$varcode."'");
	if(mysqli_num_rows($emailquery) < 1)
echo '1';
else
{
$result=mysqli_fetch_assoc($emailquery);
$status=$result['Status'];
$userid=$result['Userid'];
$query=("UPDATE user SET Status='Active' where Userid='".$userid."'");
mysqli_query($con,$query);
	session_start();
	$_SESSION['start'] = time();
	$_SESSION['name'] = $result['Name'];
	$_SESSION['userid'] = $result['Userid'];
	$_SESSION['usertype'] = $result['UserType'];
	
 echo '2';	
}
}

else
{
$emailquery=mysqli_query($con,"select Userid,Email,Name,Password,Status,vr_code from user where Email='".$email."' AND Password=SHA('".$password."')");
if(mysqli_num_rows($emailquery) < 1)
echo '1';
else
{
$result=mysqli_fetch_assoc($emailquery);
$status=$result['Status'];
if ($status=="Active")
{
	session_start();
	$_SESSION['name'] = $result['Name'];
	$_SESSION['userid'] = $result['Userid'];
 echo '2';	
}
else
{
	echo '3';
}
}
}
/*if(mysqli_num_rows($emailquery) == 1) { 

	echo '1';
} else { // else not, insert to the table
$insertq=mysqli_query($con,"INSERT INTO user (Email,Name,Password,Address
,Status,CollegeID,vr_code) VALUES ('".$email."','".$name."',SHA('".$password."'),'".$address."','InActive','".$college."','".$varcode."')") or die (mysqli_error($con));
// **************SEND EMAIL************************

  }*/
?>