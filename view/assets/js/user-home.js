// Seleciona todos os cards
let menuCards = document.querySelectorAll('.user-home-card');

// Adiciona evento de clique para cada card
menuCards.forEach(function(card) {
    card.addEventListener('click', function() {
        window.location.href = "menu.php";
        console.log('Redirecting...');
    });
});