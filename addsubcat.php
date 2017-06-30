<?php
include('include/dbconnect.php');

$catname=$_POST['catname'];
$catdes=$_POST['catdesc'];
$category=$_POST['category'];
//$img=$_POST['uploadedfile'];
//create directory
	//$thisdir = getcwd();
	if (is_dir("img/".$category.'/'.$catname)==false)
	{
	mkdir("img/".$category.'/'.$catname, 0777);
	}
$target_path = "img/".$category.'/'.$catname."/";
//$attachment = $transnumb.'/'.basename($_FILES['uploadedfile'.$ctr]['name']);

$attachment =$target_path.basename($_FILES['uploadedfile']['name']);
//Get catID
$getcatid=mysqli_query($con,"select CatID from category where Name='".$category."'");
$row=mysqli_fetch_assoc($getcatid);
$catid=$row['CatID'];
//end of catid
$query=mysqli_query($con,"INSERT INTO subcategory (Name,
					Description,Image,CatID) VALUES 
						('".$catname."', '".$catdes."','".$attachment."','".$catid."')")
				or die(mysql_error());
				$id=mysqli_insert_id($con);
				$imgname=$id.'.'.pathinfo($_FILES['uploadedfile']['name'],PATHINFO_EXTENSION);
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path.$imgname);
				echo $imgname;
//header("Location: http://{$_SERVER['HTTP_HOST']}/studentM(NEW)/newcat.php");
exit;

	?>
