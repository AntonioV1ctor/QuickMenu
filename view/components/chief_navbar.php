<header class="user-navbar-header">
    <nav class="user-navbar-nav">
        <i id="user-navbar-more-options-icon" class="fa-solid fa-bars"></i>
    </nav>
    <div id="chief-login-container" class="chief-login-container">
        <div class="chief-login-box">
            <form class="login-home-form" action="/view/pages/user/index.php" method="post">
                <div class="login-home-user-profile"></div>
                <input name="login-home-submit" class="login-home-button-default" required type="submit" value="User Screen">
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