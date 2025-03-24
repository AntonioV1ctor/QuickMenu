
<button id="component-back-button" class="button">Voltar</button>


<script>
    let forwardButton = document.getElementById("component-back-button");
    forwardButton.addEventListener("click", () => {
        history.back();
    });
</script>