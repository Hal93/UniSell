<?php
session_start();
include('include/dbconnect.php');

$itemname=$_POST['itemname'];
$itemdesc=$_POST['itemdesc'];
$qnt=$_POST['qnt'];
$price=$_POST['price'];
$subcat=$_POST['subcat'];
echo $_SESSION['userid'],$subcat,$price,$qnt,$itemdesc,$itemname;
echo "subcat".$subcat;
//get subcatid
/*$getcatid=mysqli_query($con,"select Subcat_ID from subcategory where Name='".$subcat."'");
$row=mysqli_fetch_assoc($getcatid);
$subcatid=$row['Subcat_ID'];
echo "catid".$subcatid;*/
$query=mysqli_query($con,"INSERT INTO item (Name,Description,Status,Quantity,Subcat_ID,seller,price) VALUES 
		('".$itemname."', '".$itemdesc."','avaliable','".$qnt."','".$subcat."','".$_SESSION['userid']."','".$price."')")
				or die(mysql_error());
				
//header("Location: http://{$_SERVER['HTTP_HOST']}/studentM(NEW)/newcat.php");
exit;

	?>
