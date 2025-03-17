<?php
	ob_start();
	include_once './model/database/db.php';

	if (isset($_COOKIE['user-token'])) {
		//$query = 'SELECT * FROM clients';
		$sql_r = $conn->query('SHOW TABLES');


		if (!$sql_r) {
			die('Error executing query: ' . $conn->error);
		}

		echo "Tables in the database:<br>";
		while ($row = $sql_r->fetch_row()) {
			echo $row[0] . "<br>";
		}
	} else {
		// redirect user if no cookie is found
		header('Location: /login.php', true, 302);
		exit;
	}

?>
