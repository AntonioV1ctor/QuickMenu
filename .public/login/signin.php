<?php include_once "../../view/components/head.php" ?>
<body>
    <script>
        function redirect() {
            let host = window.location.protocol + '//' + window.location.hostname;
            window.location.replace(host + '/login/login.php');
        }
    </script>

    <div class="login-home-container">
        <div class="login-home-box">
            <form action="signin" method="post">
                <input required type="text" name="username">
                <input required type="email" name="email">
                <input required type="password" name="password">
                <input required type="submit" value="sign in">
            </form>
            <button onclick='redirect()'>i already have an account</button>
        </div>
    </div>


    <?php include_once "../../view/components/footer.php" ?>
</body>
</html>

<?php include_once "../../model/scripts/user.php"?>

