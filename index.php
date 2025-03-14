<?php include_once('./view/components/head.php'); ?>

<body>
    <?php include_once('./view/components/navbar.php');?>
    <div class="login-home-container">

        <div class="login-home-box">
            <form class="login-home-form" action="/view/pages/user/index.php" method="post">
                <div class="login-home-align-input">
                    <label for="flogin">Login</label>
                    <input class="login-home-input-default" required type="email" name="flogin">
                    <label for=" fpass">Password</label>
                    <input class="login-home-input-default" required type="password" name="fpass">
                </div>
                <input class="login-home-button-default" required type="submit" value="sign in">
            </form>
        </div>
    </div>
    <?php include_once "./view/components/footer.php"; ?>
</body>

</html>