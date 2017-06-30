<!DOCTYPE html>
<html>

	<head>
		<title>Online Store</title>
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
<?php
 include('dbconnect.php');	
$result = mysqli_query($con,'SELECT Name,Image,CatID FROM category');
						if (!$result)
						{
							echo'<p>Error fetching categories</p>';
							exit();
						}
						while($row = mysqli_fetch_array($result))
							{
							$categories[] = array('Name' => $row['Name'], 'Image' => $row['Image'], 'CatID' => $row['CatID']);
							}

?>
	</head>
<body>
<div id="content">
		<div id="menu">
		
			<div id="menu_tabs">
				<ul>
				<?php if (!empty($_SESSION['name']))
         {
  echo "Welcome".$_SESSION['name'];
  echo "<li><a href='logout.inc.php'>Logout</a></li>";
   }
  else{
  echo "<li><a href='login.php'>Login/Register</a></li>";
  }
  ?>
					
					
					<li><a href="newitem.php">Place Ad</a></li>
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>	
				
				<div id="header_logo">
				<a href="index.php"><img src="logo.png" alt="logo"></a>
				</div>
		</div>
	
		
		
		<div id="categories">
			<!--Pulling this information from the database-->
			<?php foreach ($categories as $category): ?>
			<a href="#"><p><img src="<?php echo $category['Image'] ?>" alt="<?php echo $category['Name'] ?>" style="width:20px; height:20px;"><?php echo $category['Name'] ?></p></a><!-- Works but figure out about the link to the pictures-->
			<!--<?php
			$result2 = mysqli_query($con,'SELECT Name FROM subcategory WHERE CatID = $category["CatID"]');
						if (!$result2)
						{
							echo'<p>Error fetching categories</p>';
							
						}
						while($row = mysqli_fetch_array($result2))
							{
							$subcategories[] = array('Name' => $row['Name']);
							}
							?>
				<?php foreach ($subcategories as $subcategory): ?>	
					<a href="#"><p><?php echo $subcategory['Name'] ?></p></a>
				<?php endforeach; ?>
				-->
			<?php endforeach; ?>
			</div>
			
	  <div id="main_content">
	  			<div><div>
 </br>
 <form name="addcat" enctype="multipart/form-data" method="post" action="addcat1.php">
  <table border="1" align="center" >
  <tr>
    <td colspan="2">Add New Category</td>
    
  </tr>
  
  <tr>
    <td>Name</td>
    <td><input type="text" name="catname" /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><input type="text" name="catdesc" /></td>
  </tr>
  <tr>
    <td>Image</td>
    <td>
     <input name="uploadedfile" type="file"/></td> 
  </tr>
  <tr>
    <td colspan="2"><input name="submit" type="submit" value="Add" /></td>
    
  </tr>
</table>
</form>
</div></div>
 
			</div>	
			
		</div>
	<div id ="footer">
		
				<ul>
					<li><a href="">About</a></li>
					<li class="middle"><a href="">Contact</a></li>
					<li><a href="">Help</a></li>
				</ul>
			</div>	
		
	
</div>
	
	
</body>
</html>