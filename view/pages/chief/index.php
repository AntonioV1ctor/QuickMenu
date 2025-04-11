<?php include_once "./../../../model/database/db.php"; ?>
<?php
session_start();
//$chiefname = $_POST["chief-name"] ?? "";
$chiefname = $sql_db->query("SELECT username FROM clients WHERE id =". $_SESSION['user_id'] .";")->fetch_assoc();
?>
<?php include_once "./../../components/head.php"; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const setupCardClick = (cardDiv, formId) => {
            cardDiv.addEventListener('click', function() {
                document.getElementById(formId).submit();
            });
        };
        
        setupCardClick(document.querySelector('.card-pedidos'), 'form-pedidos');
        setupCardClick(document.querySelector('.card-cardapio'), 'form-cardapio');
        setupCardClick(document.querySelector('.card-estoque'), 'form-estoque');
        setupCardClick(document.querySelector('.card-faturamento'), 'form-faturamento');
        setupCardClick(document.querySelector('.card-mesas'), 'form-mesas');
    });
</script>
</head>

<body>
    <?php include_once('./../../components/chief_navbar.php'); ?>
    <div class="chief-options-container">
        <div class="chief-options-box">
            <div class="chief-head-title">
                <h1 class="chief-tltle-text">Olá, Sr(a). <?php echo $chiefname['username']; ?> </h1>
            </div>
            <table>
                <tbody>
                    <tr class="chief-options-card-div">
                        <div class="chief-options-card-default card-pedidos">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/list-icon.png" alt="list">
                            <h1>Pedidos-Ativos</h1>
                            <form id="form-pedidos" action="ativos.php" method="post">
                                <input type="hidden" name="chief-name" value="<?php echo $chiefname['username']; ?>">
                                <input type="hidden" name="restaurant-id" value="<?php echo htmlspecialchars($restaurant_id); ?>">
                                <input type="submit" class="invisible-submit">
                            </form>
                        </div>
                    </tr>

                    <tr>
                        <div class="chief-options-card-default card-cardapio">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/report-icon.png" alt="cardapio">
                            <h1>Gestão do Cardápio</h1>
                            <form id="form-cardapio" action="cardapio.php" method="post">
                                <input type="hidden" name="chief-name" value="<?php echo htmlspecialchars($chiefname); ?>">
                                <input type="hidden" name="restaurant-id" value="<?php echo htmlspecialchars($restaurant_id); ?>">
                                <input type="submit" class="invisible-submit">
                            </form>
                        </div>
                    </tr>

                    <tr>
                        <div class="chief-options-card-default card-estoque">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/dairy-products-icon.png" alt="estoque">
                            <h1>Controle de Estoque</h1>
                            <form id="form-estoque" action="estoque.php" method="post">
                                <input type="hidden" name="chief-name" value="<?php echo htmlspecialchars($chiefname); ?>">
                                <input type="hidden" name="restaurant-id" value="<?php echo htmlspecialchars($restaurant_id); ?>">
                                <input type="submit" class="invisible-submit">
                            </form>
                        </div>
                    </tr>

                    <tr>
                        <div class="chief-options-card-default card-faturamento">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/analysis-icon.png" alt="rendimentos">
                            <h1>Rendimentos Totais</h1>
                            <form id="form-faturamento" action="faturamento.php" method="post">
                                <input type="hidden" name="chief-name" value="<?php echo htmlspecialchars($chiefname); ?>">
                                <input type="hidden" name="restaurant-id" value="<?php echo htmlspecialchars($restaurant_id); ?>">
                                <input type="submit" class="invisible-submit">
                            </form>
                        </div>
                    </tr>

                    <tr>
                        <div class="chief-options-card-default card-mesas">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/table-number-icon.png" alt="mesas">
                            <h1>Gerenciamento de mesas</h1>
                            <form id="form-mesas" action="mesas.php" method="post">
                                <input type="hidden" name="chief-name" value="<?php echo htmlspecialchars($chiefname); ?>">
                                <input type="hidden" name="restaurant-id" value="<?php echo htmlspecialchars($restaurant_id); ?>">
                                <input type="submit" class="invisible-submit">
                            </form>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>
