<?php include_once "./../../components/head.php"; ?>
<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
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
                    <div class="user-home-menu user-home-card" onclick='redirect_with_param(<?php echo "`". $item_types[$i] . "`"; ?>)'></div>
                <? } ?>
            </div>
        </div>
    </div>
    <form method="POST" action="">
    <button type="submit" name="buttonClicked">Click Me!</button>
    </form>
    <script>
        // POST to redirect user on div click with ?food_type
        function redirect_with_param(param){
            window.location.href = "menu.php" + "?food_type=" + param;
            console.log('Redirecting...');
        };

    </script>
    <?php include_once "./../../components/footer.php"; ?>
</body>
</html>
