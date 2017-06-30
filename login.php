<!DOCTYPE html>
<html class="">
	<head>
		<title>Online Store</title>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>
 <script type="text/javascript" src="scriptlog.js"></script>
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
	  		<div>
<br/>
 <form action="" method="post" id="mainform1">
 <table border="2" id="tabel1"> 
 <tr id="tableh"> <td colspan="2">  User SignIn  </td></tr>
 <tr id="tablecolor1">
   <td><label>Email</label></td> <td> <input type="text" name="email" formnovalidate /> </td>
  </tr>
  <tr id="tablecolor1">
   <td><label>Password</label> </td><td><input type="password" name="password" formnovalidate /></td>
  </tr>
  <tr hidden="true" id="tablecolor1" class="show2">
   <td><label>Varification code</label> </td><td><input type="text" name="varcode" formnovalidate /></td>
  </tr>
 <tr id="tablecolor">
   <td colspan="2"><input name="login" type="button" value="Login"> <a href="adduser.php">Register</a></td>
  </tr>
  
 
  </table>
 </form>
 </div> 
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