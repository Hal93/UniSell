<?php
/*
	author: istockphp.com
*/
require_once("include/dbconnect.php"); // require the db connection

/* catch the post data from ajax */
//$fname = $_POST['fname']; 
//$lname = $_POST['lname'];
$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$address=$_POST['address'];
$college=$_POST['college'];
$varcode=rand(100,999).rand(100,99);
$emailquery=mysqli_query($con,"select Email from user where Email='".$email."'");


if(mysqli_num_rows($emailquery) == 1) { 

	echo '1';
} else { // else not, insert to the table
$insertq=mysqli_query($con,"INSERT INTO user (Email,Name,Password,Address
,Status,CollegeID,vr_code) VALUES ('".$email."','".$name."',SHA('".$password."'),'".$address."','InActive','".$college."','".$varcode."')") or die (mysqli_error($con));
// **************SEND EMAIL************************
$to      = $email;
$subject = 'Welcome to my StudentMarket.ie';
$message = 'Hi "'.$name.'"   ...this is a test (1sending from website when user singup)

Thank you for register in student market 
you varification code is "'.$varcode.'".
Development Team 
Regards';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

	echo '2';
	
	//$query = mysql_query("INSERT INTO `users` (`first_name` ,`last_name` ,`email`)
					//	VALUES ('$fname', '$lname', '$email')"); 
		
  }
?>