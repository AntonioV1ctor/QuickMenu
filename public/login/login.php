<?php include_once "../../view/components/head.php" ?>
<body>
    <script>
        function redirect() {
            let host = window.location.protocol + '//' + window.location.hostname;
            window.location.replace(host + '/login/signin.php');
        }
    </script>

    <div class="login-home-container">
        <div class="login-home-box">
            <form action="login" method="post">
                <input required type="email">
                <input required type="password">
                <input required type="submit" value="sign in">
            </form>
        </div>
        <button onclick='redirect()'>i dont have a account</button>
    </div>
    <?php include_once "../../view/components/footer.php" ?>
</body>
</html>