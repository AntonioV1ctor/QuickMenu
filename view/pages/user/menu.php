<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php
    // get items from the chosen type
    include_once('./../../../model/database/db.php');

    $items = [];
    $type = $_GET['item_type'];
    if (isset($type)) {
        static $items;
        $items = $sql_db->query("SELECT * FROM menu WHERE item_type = \"".$type."\";");
    }
    if (!$type) { $type = 'Outros'; }
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
    <div class="menu-options-container">
        <div class="user-home-restaurant-logo-area">
            <div class="user-home-restaurant-logo-div">
                <img class="user-home-restaurant-img" src="https://encurtador.com.br/1uewd" alt="logo">
            </div>
            <h1 class="user-home-restaurant-name">Burger Palace</h1>
        </div>
        <div class="menu-options-box">
            <div class="menu-options-title">
                <i id="menu-options-icon" class="fa-solid fa-arrow-left"></i>
		<h1><? echo $type;?></h1>
            </div>
            <div class="menu-options-menu-cards">
		<?php while ($row = $items->fetch_assoc()) { 
		    $d_query = $sql_db->query('SELECT image_path FROM menu_description WHERE id = '. $row['id'] .';');
		    $img_p = $d_query->fetch_assoc();
    		    ?>					
                    <div class="menu-options-products">
			    <img class="menu-options-products-img" src="<? echo $img_p['image_path'];?>">
                            <p><strong><?php echo $row['item_name']; ?></strong></p>
                            <p>Valor: R$<?php echo $row['item_price']; ?></p>
                            <button class="menu-options-view-button" type="submit"
                            onclick="redirect_with_param('food.php', 'id', '<?php echo $row['id']; ?>')"
                            >Visualizar</button>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <script src="/view/assets/js/main.js"></script>
    <script src="/view/assets/js/menu.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>
</html>
