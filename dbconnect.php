<?php
	/**********************************************************
	* 
	* Class: DbConnector 
	* Purpose: Connect to a MySQL database
	*
	**********************************************************/ 
	$con=mysqli_connect("localhost","root","") or die(mysqli_error());
	mysqli_select_db($con,"marketdb") or die(mysqli_error());	
?>
