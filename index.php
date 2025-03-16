<?php

if (isset($_POST["login-home-submit"])) {
    $login = $_POST["login-home-flogin"];
    $pass = $_POST["login-home-fpass"];
    if (empty($login) && empty($pass)) {
        echo "";
    } else {
        if ($login == "quickmenu@gmail.com" && $pass == "dadada") {
            echo "logado";
        } else {
            echo "Login ou Senha Incorreta!";
        }
    }
} else {
    echo "";
}

?>

<?php include_once('./view/components/head.php'); ?>

<body>
    <?php include_once('./view/components/navbar.php'); ?>
    <div class="login-home-container">
        <div class="login-home-box">
            <form class="login-home-form" action="index.php" method="post">
                <div class="login-home-user-profile"></div>
                <div class="login-home-align-input">
                    <i id="login-home-icon-email" class="fa-solid fa-envelope"></i>
                    <input name="login-home-flogin" class="login-home-input-default" required type="email" placeholder="Login">
                    <i id="login-home-icon-pass" class="fa-solid fa-unlock"></i>
                    <input name="login-home-fpass" class="login-home-input-default" required type="password" placeholder="Password">
                </div>
                <input name="login-home-submit" class="login-home-button-default" required type="submit" value="sign in">
            </form>
        </div>
    </div>
    <?php include_once "./view/components/footer.php"; ?>
</body>

</html>