<?php include_once "./../../components/head.php"; ?>
</head>

<body>
    <?php include_once('./../../components/chief_navbar.php'); ?>
    <div class="chief-options-container">
        <div class="chief-options-box">

            <div class="chief-head-title">
                <i id="menu-options-icon" class="fa-solid fa-arrow-left"></i>
                <h1 class="chief-tltle-text">Pedidos Ativos</h1>
            </div>
            <table class="pedidos-table">
                <thead>
                    <tr>
                        <th>Mesa</th>
                        <th>Pedido</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Danilo, aqui voce vai ter que fazer um modo de ler o banco de dados e subistituir esse modal pelos valores do Db. -->
                    <tr>
                        <td>01</td>
                        <td>1x Hambúrguer Clássico<br>2x Batata Frita</td>
                        <td>R$ 45,90</td>
                        <td><span class="status-pendente">Pendente</span></td>
                        <td>
                            <button class="action-button">Finalizar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>2x Pizza Margherita<br>1x Refrigerante 2L</td>
                        <td>R$ 89,90</td>
                        <td><span class="status-pendente">Pendente</span></td>
                        <td>
                            <button class="action-button">Finalizar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>1x Salada Caesar<br>1x Suco Natural</td>
                        <td>R$ 32,90</td>
                        <td><span class="status-pendente">Pendente</span></td>
                        <td>
                            <button class="action-button">Finalizar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/view/assets/js/menu.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>