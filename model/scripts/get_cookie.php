<?php
	if (isset($_COOKIE['user-token'])) {
		//echo $_COOKIE['user-token'];
		//setcookie('user-token', '', -1);;
	} else {
		header('location: /login/signin.php', true, 302);
		die();	
	}
?>
