<?php
session_start();

// redirect user if no session data is found
if (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) {
	if (isset($_SERVER['HTTPS'])) {
		header('location: https://'. $_SERVER['SERVER_NAME']);
	} else {
		header('location: http://'. $_SERVER['SERVER_NAME']);	
	}


}
?>
