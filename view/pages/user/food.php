<!-- Aqui Danilo voce teria que fazer algo semelhante ao que voce fez com a conexao de index.php com menu.php so que agora voce vai ter que fazer isso com menu.php com food.php -->
<?php include_once "./../../components/head.php"; ?>

<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <div class="food-option-conatiner">
        <div class="food-option-box">
            <i id="food-option-back-to-menu" class="fa-solid fa-arrow-left"></i>
            <form class="food-option-chosed" action="" method="post">
                <div class="food-option-align">
                    <img class="food-options-products-img" src="https://encurtador.com.br/IKbQk" alt="food">
                    <div class="food-option-ingredients-div">
                        <h1><strong>Hamburger Picante</strong></h1>
                        <p>Blend de carnes (costela e fraldinha), queijo cheddar picante, bacon, jalapeños, molho sriracha, cebola caramelizada, pimenta calabresa, servido no pão brioche.</p>
                    </div>
                    <h1>Valor:<strong>R$100</strong></h1>
                </div>
                <input class="food-option-button-choice" type="submit" value="Adicionar">
            </form>
        </div>
    </div>
    <script src="/view/assets/js/user-food.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>