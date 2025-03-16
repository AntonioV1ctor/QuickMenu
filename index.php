<?php
include'model/database/db.php';
if (isset($_POST["login-home-flogin"]) || isset($_POST["login-home-fpass"])) {
    $login = $mysqli->real_escape_string($_POST["login-home-flogin"]);
    $pass = $mysqli->real_escape_string($_POST["login-home-fpass"]);

    $sql_code = "SELECT * FROM users WHERE 'login'='$login' AND 'password'='$pass' ";
    $sql_query = $mysqli->query($sql_code) or die("Database Fatal Error!");


    $rows = $sql_query->num_rows;
    if($rows == 1) {
        $user = $sql_query->fetch_assoc();
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['id'] = $user["id"];
        $_SESSION['login'] = $login["login"];
        $_SESSION['password'] = $pass["password"];
        echo$login;
        echo$pass;


        header("Location: view/pages/user/");
    }else{
        echo"Login Error!";
    }
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