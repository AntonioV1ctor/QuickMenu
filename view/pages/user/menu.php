<!-- Danilo, aqui você vai precisar criar uma função em PHP que gere dinamicamente o conteúdo da página com base no produto selecionado na tela anterior. 
Exemplo: quando o usuário clica em "Hamburgers" na página anterior, ele é redirecionado para essa página, que deve exibir:
    1. O título da categoria (ex: "Hamburgers").
    2. Um conjunto de cards com os hambúrgueres disponíveis e seus preços.

Essa página deve ser única para cada tipo de produto (não deve haver uma tela fixa para "Hamburgers", "Bebidas", "Salgados", etc.). 
Ou seja, o PHP precisa identificar qual produto foi selecionado e gerar a página dinamicamente com base nesse produto.

A ideia é usar um identificador único, como um ID, para determinar qual produto foi clicado e construir o conteúdo da página a partir disso. Remova esse comentario dps... -->
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