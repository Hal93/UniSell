<?php 
session_start(); 
//include('session_start.inc.php'); 
?>
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
					
			<?php endforeach; ?>
			</div>
			
	  <div id="main_content">
	  			<div id="recentads">
				<h2>Recent Ads</h2>
				<!-- this information from the database-->
				<a href=""><p>Room For Rent: &euro;80 per week</p></a>
				<a href=""><p>Java Programming Book: &euro;25 </p></a>
				<a href=""><p>Maths Grinds: &euro;20</p></a>
				<a href=""><p>More..</p></a>
			</div>
			<div id="popularads">
			<!--Pulling this information from the database-->
				<h2>Most Popular Ads</h2>
			<a href="">	<p>Java Object Oriented Coding Grinds &euro;15</p></a>
			<a href="">	<p>4th Year Business notes &euro;5</p></a>
			<a href="">	<p>Ipod-touch 8gb &euro;115</p></a>
				<a href=""><p>More..</p></a>
			</div>
	
			<div id="search">
			<form>
				<div id="area">
					<label>Area</label>
					<select>
						<option value=""></option>
						<optgroup label="Connacht">
						 <option value="galway">Galway</option>
						<optgroup label="Munster">
						<option value="cork">Cork</option>
						<optgroup label="Leinster">
						<option value="dublin">Dublin</option>
						<optgroup label="Ulster">
						<option value="antrim">Antrim</option>
					</select>
				</div>
				<div id="category">
					<label>Category</label>
					<select>
						<option value=""></option>
						<?php foreach ($categories as $category): ?>
						<option value="<?php echo $category['Name'] ?>"><?php echo $category['Name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			
			<br/>
			<br/>
			    <input type="text" size="21" maxlength="120">
				<input type="submit" class="" value="search" >
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