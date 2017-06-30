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
		<script type="text/javascript">
$(document).ready(function()
{
$(".cat").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "getsubcat.php",
data: dataString,
cache: false,
success: function(html)
{
$(".subcat").html(html);
} 
});

});

});

</script>
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
 <form name="addcat" method="post" action="additem.php">
  <table border="1" align="center" >
  <tr>
    <td colspan="2">Add New Item</td>
    
  </tr>
  
  <tr>
    <td>Name</td>
    <td><input type="text" name="itemname" /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><input type="text" name="itemdesc" /></td>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><input type="number" name="qnt" /></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input type="text" name="price" /></td>
  </tr>
  <tr>
    <td>Category</td>
    <td> <select name="cat"  class="cat">
              <option selected="selected">--Select Category--</option>
                  <?php
			  	$result = mysqli_query($con,"SELECT CatID,Name FROM category")
				or die(mysql_error());
				
				while($row=mysqli_fetch_assoc($result)){
					$id=$row['CatID'];
						echo '<option value="'.$id.'">'.$row['Name'].'</option>';
				}?>
                </select></td>
  </tr>
  <tr>
    <td>Subcategory</td>
    <td> <select name="subcat"  class="subcat">
               		<option> </option>
                </select></td>
  </tr>
  <tr>
    <td colspan="2"><input name="submit" type="submit" value="Add" /></td>
    
  </tr>
</table>
</form>
</div></div>
	  
	  
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