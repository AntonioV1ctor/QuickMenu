<?php include_once "./../../components/head.php"; ?>
</head>

<body>
    <?php include_once('./../../components/chief_navbar.php'); ?>
    <div class="chief-login-conatiner">
        <div class="chief-login-box">
            <form class="chief-login-form" action="" method="post">
                <div class="chief-login-user-profile"></div>
                <div class="chief-login-align">
                    <i id="chief-login-icon-email" class="fa-solid fa-envelope"></i>
                    <input type="text" name="chief-login-email" placeholder="Login">
                    <i id="chief-login-icon-pass" class="fa-solid fa-unlock"></i>
                    <input type="password" name="chief-login-password" placeholder="Password">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>