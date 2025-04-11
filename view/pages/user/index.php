<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php include_once('./../../../model/scripts/get_item_types.php'); ?>
<?php include_once('./../../../config/config.php'); ?>
<?php 
	// set the type's image to the first item of its type
	$it_images = [];
	
	foreach ($it_col as $col) {
		$query = $sql_db->query('SELECT image_path FROM menu_description WHERE id =' . $col['id']. ';')->fetch_assoc();
		$it_images[] = $query;
	}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_note'])) {
    // Insert the order data into the orders table
    $sql_db->query("INSERT INTO orders (user_id, user_note) VALUES (" . $_SESSION['user_id'] . ", '" . $_POST['order_note'] . "');");

    // Decode the order data as an associative array
    $order_data = json_decode($_POST['order_data'], true); // Ensure it's decoded as an associative array

    // Get the last order id for this user (the most recent order)
    $ooo = $sql_db->query('SELECT * FROM orders WHERE user_id = ' . $_SESSION['user_id'] . ' ORDER BY id DESC LIMIT 1;')->fetch_assoc();

    // Insert items into the order_items table
    foreach ($order_data as $item) {
        // Ensure that the array contains the actual item ID and quantity
        foreach ($item as $i_id => $i_q) {
            // Ensure proper escaping of values to prevent SQL injection
            $order_id = $ooo['id'];
            $item_id = (int)$i_id;  // Cast item_id to integer
            $quantity = (int)$i_q;  // Cast quantity to integer

            // Insert the item into the order_items table
            $sql_db->query("INSERT INTO order_items (order_id, item_id, quantity) VALUES ($order_id, $item_id, $quantity);");
        }
    }

    // Optionally, display the order data for debugging
    var_dump($order_data);
    $_SESSION['cart'] = [];
}
?>

<?php include_once "./../../components/head.php"; ?>
<?php include_once "./../../components/cart_modal.php"; ?>

<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <button onclick="showCart()" class="ver-carrinho-btn">
        <i class="fa-solid fa-shopping-cart"></i>
        Ver Carrinho
    </button>
    <div class="user-home-container">
        <div class="user-home-restaurant-logo-area">
            <div class="user-home-restaurant-logo-div">
                <img class="user-home-restaurant-img" src="https://encurtador.com.br/1uewd" alt="logo">
            </div>
	    <h1 class="user-home-restaurant-name"><? echo $restaurant_name; ?></h1>
        </div>

        <div class="user-home-box">
            <h1 class="user-home-title-menu">Cardápio</h1>
            <div class="user-home-menu-cards">

                <?php for ($i = 0; $i < $t_count; $i++) { ?>
		    <div class="user-home-menu user-home-card" style="background-image: url('<? echo '../../../' . $it_images[$i]['image_path']; ?>');" 
                    onclick='redirect_with_param("menu.php", "item_type", <?php echo "`".$item_types[$i]."`"; ?>)'
                    ></div>
                <? } ?>
            </div>
        </div>
    </div>
    <script src="/view/assets/js/main.js"></script>
    <?php include_once "./../../components/footer.php"; ?>

</body>
</html>
