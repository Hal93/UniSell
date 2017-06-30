<?php
include('dbconnect.php');

$catname=$_POST['catname'];
$catdes=$_POST['catdesc'];
//$img=$_POST['uploadedfile'];
//create directory
	//$thisdir = getcwd();
	if (is_dir("img/".$catname)==false)
	{
	mkdir("img/".$catname, 0777);
	}
$target_path = "img/".$catname."/";
//$attachment = $transnumb.'/'.basename($_FILES['uploadedfile'.$ctr]['name']);

$attachment =$target_path.basename($_FILES['uploadedfile']['name']);
$query=mysqli_query($con,"INSERT INTO category (Name,
					Description,Image) VALUES 
						('".$catname."', '".$catdes."', '".$attachment."')")
				or die(mysql_error());
				$id=mysqli_insert_id($con);
				$imgname=$id.'.'.pathinfo($_FILES['uploadedfile']['name'],PATHINFO_EXTENSION);
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path.$imgname);
				echo $imgname;
//header("Location: http://{$_SERVER['HTTP_HOST']}/studentM(NEW)/newcat.php");
exit;

	?>
