<?php include_once "./../../components/head.php"; ?>

<body>
    <?php include_once('./../../components/user_navbar.php'); ?>
    <div class="user-home-container">
        <div class="user-home-box">
            <h1 class="user-home-title-menu">Cardápio</h1>
            <div class="user-home-menu-cards">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="user-home-menu user-home-card"></div>
                <? } ?>
            </div>
        </div>
    </div>
    <script src="/view/assets/js/user-home.js"></script>
    <!-- Redirect was making by Js modify this Danilo to use PHP Ok? -->
    <?php include_once "./../../components/footer.php"; ?>

</body>
<!-- Danilo se voce estiver vendo isso aqui voce vai ter que criar um loop com foreach do PHP onde el vai subistituir essas informacoes do modal pela as informacoes do banco de dados onde ele vai ler uma tabela especifica dentro do banco de dados da tabela que voce vai criar chamado restaurants ou algo do tipo. Entao faca isso e depois remova esse comentario... -->

</html>