<?php
	if (isset($_COOKIE['user-token'])) {
		//echo $_COOKIE['user-token'];
	} else {
		header('location: /login/signin.php', true, 302);
		die();	
	}
?>
