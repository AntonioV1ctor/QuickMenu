<header class="user-navbar-header">
    <nav class="user-navbar-nav">
        <i id="user-navbar-more-options-icon" class="fa-solid fa-bars"></i>
    </nav>
    <div id="chief-login-container" class="chief-login-container">
        <div class="chief-login-box">
            <form class="login-home-form" action="/view/pages/chief/index.php" method="post">
                <div class="login-home-chief-profile"></div>
                <div class="login-home-align-input">
                    <i id="login-home-icon-email" class="fa-solid fa-envelope"></i>
                    <input name="login-home-flogin" class="login-home-input-default" required type="text" maxlength="30" placeholder="Login">
                    <i id="login-home-icon-pass" class="fa-solid fa-unlock"></i>
                    <input name="login-home-fpass" class="login-home-input-default" required type="password" placeholder="Password">
                </div>
                <input name="login-home-submit" class="login-home-button-default" required type="submit" value="sign in">
            </form>
        </div>
    </div>
</header>



<script>
    const navbarIcon = document.getElementById('user-navbar-more-options-icon');
    const navbarLoginDiv = document.getElementById('chief-login-container');

    navbarIcon.addEventListener('click', function() {
        navbarLoginDiv.classList.toggle('visible');
        console.log("Menu alternado");
    });
</script>