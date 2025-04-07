<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php include_once('./../../../model/scripts/get_item_types.php'); ?>
<?php 
	// set the type's image to the first item of its type
	$it_images = [];
	
	foreach ($it_col as $col) {
		$query = $sql_db->query('SELECT image_path FROM menu_description WHERE id =' . $col['id']. ';')->fetch_assoc();
		$it_images[] = $query;
	}
?>
<?php include_once "./../../components/head.php"; ?>
<body>
<?php include_once "./../../components/user_navbar.php"; ?>
    <div class="user-home-container">
        <div class="user-home-restaurant-logo-area">
            <div class="user-home-restaurant-logo-div">
                <img class="user-home-restaurant-img" src="https://encurtador.com.br/1uewd" alt="logo">
            </div>
            <h1 class="user-home-restaurant-name">Burger Palace</h1>
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
    <?php //include_once "./../../components/footer.php"; ?>
</body>
</html>


