<?php
include('include/dbconnect.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysqli_query($con,"select Subcat_ID,Name from subcategory where CatID='$id'");
while($row=mysqli_fetch_assoc($sql))
{
$id=$row['Subcat_ID'];
$data=$row['Name'];
echo '<option value="'.$id.'">'.$data.'</option>';
}
}
?>