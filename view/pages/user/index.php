<?php include_once('./../../../model/scripts/check-session.php'); ?>

<?php include_once "./../../components/head.php"; ?>
<body>
<?php include_once "./../../components/head.php"; ?>
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

                <?php include_once('./../../../model/scripts/get_item_types.php'); for ($i = 0; $i < $t_count; $i++) { ?>
                    <div class="user-home-menu user-home-card" 
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


