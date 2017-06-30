<?php
	session_start();
	ob_start();
	// time limit in seconds
	$timeLimit = 120 * 60;
	// current time
	$now = time();
	// redirect page
	$redirect = "http://{$_SERVER['HTTP_HOST']}/studentM(NEW)/login.php";
	// user type
	//$userType = $_SESSION['userType'];
	
	// redirect to login page if session variable not set
	if (!isset($_SESSION['userid']))
	{
		header("Location: $redirect");
		exit;
	}
	// destroy session and redirect if timelimit expired
	elseif ($now > $_SESSION['start'] +$timeLimit)
	{
		// empty session array
		$_SESSION = array();
		// invalidate the session cookie
		if (isset($COOKIE[session_name()])) { setcookie(session_name(), '', time() - 86400, '/'); }
		// end session and redirect with query string
		session_destroy();
		header("Location: {$redirect}?expired=yes");
		exit;
	}
	// if it's got this far, its ok, so update start time
	else
	{
		$_SESSION['start'] = time();
	}
?>
