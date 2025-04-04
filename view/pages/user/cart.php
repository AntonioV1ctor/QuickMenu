<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php
include_once('./../../../model/database/db.php');

//session_start();

// get all items to diplay the name of those in the cart
$items_q = $sql_db->query('SELECT * FROM menu;');
$items_t = [];
$items = [];

// the data is in a difrent order than the id
while ($collum = $items_q->fetch_assoc()) {
	foreach ($_SESSION['cart'] as $val) {
		if ($collum['id'] == $val) {
			$items_t[] = $collum;
		}
	}
}

// no idea with what to do with $items for now :/
$items = $items_t;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-c-item'])) {
	// handle cart items
	array_splice($_SESSION['cart'], $_POST['delete-c-item'], 1);
	echo $_POST['delete-c-item'];	
} else {
	// handle cart actions
	if (isset($_POST['cart-action']) && $_POST['cart-action'] == 'clear') {
		$_SESSION['cart'] = [];
	} else {
		// place order
		header('location: payment.php');
	}
}
	
?>

<html>
<body>
	<script></script>
	<button>back</button>	

	<h1>(<? echo $_SESSION['user_id']; ?>) cart</h1>

	<h2>cart</h2>
	<div id="cart-contents">
		<?php for ($i = 0; $i < count($_SESSION['cart']); $i++) {?>
		<div class="cart-item">
			<form action="" method="post">
				<!--<p><?php echo $_SESSION['cart'][0];?></p>-->
				<p style="display: inline;"><? echo '('. $i . ') '. $items[$i]['item_name'] .' R$'.$items[$i]['item_price']; ?></p>
				<input name="delete-c-item" type="hidden" value="<?php echo $i; ?>">
				<button type="submit">remove</button>
			</form>
		</div>
		<? } ?>
	</div>
	<p>total </p>
	

	<form action="" method="post">
		<input name="cart-action" type="hidden" value="clear">
		<button type="submit">clear</button>	
	</form>

	<form action="" method="post">
		<input name="cart-action" type="hidden" value="order">
		<button type="submit">buy</button>
	</form>
</body>
</html>
