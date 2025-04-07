<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php
    // get items from the chosen type
    include_once('./../../../model/database/db.php');

    $items = [];
    $type = $_GET['item_type'];
    if (isset($type)) {
        static $items;
        $items = $sql_db->query("SELECT * FROM menu WHERE item_type = '".$type."';");
    }
    if (!$type) { $type = 'Others'; }
?>

<?php include_once "./../../components/head.php"; ?>
<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <div class="menu-options-container">
        <div class="user-home-restaurant-logo-area">
            <div class="user-home-restaurant-logo-div">
                <img class="user-home-restaurant-img" src="https://encurtador.com.br/1uewd" alt="logo">
            </div>
            <h1 class="user-home-restaurant-name">Burger Palace</h1>
        </div>
        <div class="menu-options-box">
            <div class="menu-options-title">
                <i id="menu-options-icon" class="fa-solid fa-arrow-left" 
                onclick="window.location.href = './'"
                ></i>
                <h1><?php echo $type; ?></h1>
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
    <?php //include_once "./../../components/footer.php"; ?>
</body>

</html>
