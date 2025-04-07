<header class="user-navbar-header">
  <nav class="user-navbar-nav">
      
        <i onclick="logout()" title="Logout" id="user-navbar-more-options-icon" class="fa-solid fa-power-off"></i>
      
  </nav>
</header>

<script>
  function logout() {
    const confirmaLogout = confirm("Você tem certeza que deseja sair?");
    if (confirmaLogout) {
      alert("Você foi deslogado!");
      window.location.href = "/view/pages/user/index.php";
    } else {
      console.log("Abortado...");
    }
  }
</script>
