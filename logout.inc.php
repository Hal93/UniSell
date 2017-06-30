<?php
	// run this script only if the logout button has been clicked
	//if (array_key_exists('logout', $_POST))
	//{
		// empty the $_SESSIOn array
		$_SESSION = array();
		// invalidate the session cookie
		if (isset($COOKIE[session_name()])) 
		{ 
			setcookie(session_name(), '', time() - 86400, '/'); 
		}
		// end session and redirect
		session_destroy();
		header("Location: http://{$_SERVER['HTTP_HOST']}/shop/login.php");
		exit;
	//}	
?>
