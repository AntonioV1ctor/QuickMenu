<?php include_once "./../../components/head.php"; ?>
<?php 
if($_SERVER['REQUEST_METHOD']){
    $chiefname = $_POST["chief-name"];
}
?>
</head>

<body>
    <?php include_once('./../../components/chief_navbar.php'); ?>
    <div class="chief-options-container">
        <div class="chief-options-box">
            <div class="chief-head-title">
                <h1 class="chief-tltle-text">Ola, Sr(a). <? echo"$chiefname";?> </h1>
            </div>
            <table>
                <tbody>
                    <tr class="chief-options-card-div">
                        <div class="chief-options-card-default">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/list-icon.png" alt="">
                            <h1>Pedidos-Ativos</h1>
                        </div>
                    </tr>
                    <tr>
                        <div class="chief-options-card-default">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/report-icon.png" alt="">
                            <h1>Gestão do Cardápio</h1>
                        </div>
                    </tr>
                    <tr>
                        <div class="chief-options-card-default">
                            <img class="chief-default-icon-style" src="/view/assets/images/Icons/dairy-products-icon.png" alt="">
                            <h1>Controle de Estoque</h1>
                        </div>
                    </tr>
                    <tr>
                        <div class="chief-options-card-default">
                        <img class="chief-default-icon-style" src="/view/assets/images/Icons/analysis-icon.png" alt="">
                            <h1>Rendimentos Totais</h1>
                        </div>
                    </tr>
                    <tr>
                        <div class="chief-options-card-default">
                        <img class="chief-default-icon-style" src="/view/assets/images/Icons/table-number-icon.png" alt="">
                            <h1>Gerenciamento de mesas</h1>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>