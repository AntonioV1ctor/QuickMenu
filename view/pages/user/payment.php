<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php
// handle payment
include_once('./../../../model/database/db.php');

$payed = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// send order to server	
	$sql_db->query('DROP TABLE o_'. $_SESSION['user_id'] .';');
	$sql_db->query('CREATE TABLE o_'. $_SESSION['user_id'] .'(id INT);' );
	$sql_db->query('INSERT INTO orders (id) VALUES ('. $_SESSION['user_id'] .');');
	
	foreach ($_SESSION['cart'] as $item) {	
		$sql_db->query('INSERT INTO o_'. $_SESSION['user_id'] .' (id) VALUES ('. $item .');');
	}
	$_SESSION['cart'] = [];	
	$payed = 1;
}
?>
<html>
<head></head>
<body>
	<? if (!$payed) { echo '
	<p>choose payment option:</p>
	
	<form method="post">
		<input type="hidden" name="method" value="debit">
		<button type="submit">debit</button>
	</form>	
	<form method="post">
		<input type="hidden" name="method" value="credit">
		<button type="submit">credit</button>	
	</form>	
	<form method="post">
		<input type="hidden" name="method" value="cash">
		<button type="submit">in cash</button>	
	</form>
	' ; } ?>
	<? if ($payed) { echo ' 
	<p>order placed, thank you for choosing usssss :3</p>
	<button onclick="window.location.href = \'./\'">go back to menu</button>
	' ; } ?>
</body>
</html>
