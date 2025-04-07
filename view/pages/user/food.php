<?/*<<<<<<< HEAD
<?php include_once "./../../components/head.php"; ?>
<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <div class="food-option-conatiner">
        <div class="food-option-box">
            <i id="food-option-back-to-menu" class="fa-solid fa-arrow-left" 
            onclick='redirect_with_param("menu.php", "item_type", <?php echo "`".$s_menu["item_type"]."`"; ?>)'
            ></i>

            <form class="food-option-chosed" action="" method="post">
                <div class="food-option-align">
		    <img class="food-options-products-img" src="<? echo $s_desc['image_path']; ?>" alt="food">
                    <div class="food-option-ingredients-div">
                        <h1><strong><?php echo $s_menu['item_name'] ?></strong></h1>
                        <p><?php echo $s_desc['content'] ?></p>
                    </div>
                    <h1>Valor:<strong>R$<?php echo $s_menu['item_price'] ?></strong></h1>
		</div>
		<input name="add" type="hidden" value="<?php echo $_GET['id']; ?>">	
                <input class="food-option-button-choice" type="submit" value="Adicionar">
            </form>
        </div>
    </div>

    <script src="/view/assets/js/main.js"></script>
    <?//php include_once "./../../components/footer.php"; ?>
</body>

</html>
=======*/?>
<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php // get self data
    include_once('./../../../model/database/db.php');   

    $s_menu = [];


    $self_id = $_GET['id'];
    if (isset($self_id)) {
        $s_m_query = $sql_db->query("SELECT * FROM menu WHERE id = '".$self_id."';");
        $s_menu = $s_m_query->fetch_assoc();

        $s_m_query2 = $sql_db->query("SELECT * FROM menu_description WHERE id = '".$self_id."';");
        $s_desc = $s_m_query2->fetch_assoc();

        if (!isset($s_desc['content']) || !$s_desc['content']) {
            $s_desc['content'] = 'sem descrição';
        }
    }
?>
<?php // add item to cart
	if (isset($_POST['add'])) {
		$_SESSION['cart'][] = $_GET['id'];
		header('location: menu.php?item_type='. $s_menu['item_type']);

	}

?>
<?php include_once "./../../components/head.php"; ?>
<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <div class="food-option-conatiner">
        <div class="food-option-box">
            <i id="food-option-back-to-menu" class="fa-solid fa-arrow-left" 
            onclick='redirect_with_param("menu.php", "item_type", <?php echo "`".$s_menu["item_type"]."`"; ?>)'
            ></i>

            <form class="food-option-chosed" action="" method="post">
                <div class="food-option-align">
		    <img class="food-options-products-img" src="<? echo $s_desc['image_path']; ?>" alt="food">
                    <div class="food-option-ingredients-div">
                        <h1><strong><?php echo $s_menu['item_name'] ?></strong></h1>
                        <p><?php echo $s_desc['content'] ?></p>
                    </div>
                    <h1>Valor:<strong>R$<?php echo $s_menu['item_price'] ?></strong></h1>
		</div>
		<input name="add" type="hidden" value="<?php echo $_GET['id']; ?>">	
                <input class="food-option-button-choice" type="submit" value="Adicionar">
            </form>

        </div>
    </div>
    <script src="/view/assets/js/main.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>
