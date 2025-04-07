<?php include_once "./../../components/head.php"; ?>
<?php include_once "./../../components/cart_modal.php"; ?>
<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <button onclick="showCart()" class="cart-button">
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
                <h1>Hamburgers</h1>
            </div>
            <div class="menu-options-menu-cards">
                <?php for ($h = 0; $h < 20; $h++) { ?>
                    <div class="menu-options-products">
                        <form action="food.php" class="menu-options-products-box" method="POST">
                            <img class="menu-options-products-img" src="https://encurtador.com.br/IKbQk">
                            <p>Hamburger Picante</p>
                            <p>Valor:100R$</p>
                            <input class="menu-options-view-button" type="submit" value="Visualizar">
                        </form>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <script src="/view/assets/js/menu.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>
</html>