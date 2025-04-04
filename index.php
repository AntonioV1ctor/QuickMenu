<?php
// handle session
include_once('./model/database/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// check if password is right
	$up = $sql_db->query('SELECT * FROM clients WHERE user_email = "'. $_POST['login-home-flogin'] .'";');
	$user = $up->fetch_assoc();

	if ($user['pass'] == $_POST['login-home-fpass']) {
		$_SESSION['user_id'] = $user['id'];	
		header('location: /view/pages/user');
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
