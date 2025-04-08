<?php
include_once('./../../../model/database/db.php');
//session_start();
$cart_count = count($_SESSION['cart']);

// get data from each item in cart
$items_m = [];
$items_d = [];
$total_price = 0;
foreach ($_SESSION['cart'] as $c_item) {
	$c_data = $sql_db->query('SELECT * FROM menu WHERE id = ' . $c_item . ';')->fetch_assoc();
	$c_d_data = $sql_db->query('SELECT * FROM menu_description WHERE id = ' . $c_item . ';')->fetch_assoc();
	
	$items_m[] = $c_data;
	$items_d[] = $c_d_data;
	$total_price += $c_data['item_price'];
}



?>
<div id="cart-modal" class="cart-modal">
    <div class="cart-modal-content">
        <div class="cart-modal-header">
            <h2>Seu Pedido</h2>
            <span class="cart-close">&times;</span>
        </div>
	<div class="cart-modal-body">
	    <div class="cart-items">

		<?php for ($i = 0; $i < $cart_count; $i++) { ?>
                <div class="cart-item">
                    <div class="cart-item-info">
                        <h3>Batata Frita Grande</h3>
                        <p>Porção 300g com molho especial</p>
                    </div>
                    <div class="cart-item-actions">
                        <button class="quantity-btn" onclick="updateQuantity(2, 'decrease')">-</button>
                        <span class="item-quantity">1</span>
                        <button class="quantity-btn" onclick="updateQuantity(2, 'increase')">+</button>
                        <span class="item-price">R$ 15,90</span>
                    </div>
		</div>
		<? } ?>

		<!-- Itens do carrinho (estáticos para exemplo) -->
                <div class="cart-item">
                    <div class="cart-item-info">
                        <h3>Hambúrguer Clássico</h3>
                        <p>Pão, hambúrguer, alface, tomate</p>
                    </div>
                    <div class="cart-item-actions">
                        <button class="quantity-btn" onclick="updateQuantity(1, 'decrease')">-</button>
                        <span class="item-quantity">2</span>
                        <button class="quantity-btn" onclick="updateQuantity(1, 'increase')">+</button>
                        <span class="item-price">R$ 29,90</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-item-info">
                        <h3>Batata Frita Grande</h3>
                        <p>Porção 300g com molho especial</p>
                    </div>
                    <div class="cart-item-actions">
                        <button class="quantity-btn" onclick="updateQuantity(2, 'decrease')">-</button>
                        <span class="item-quantity">1</span>
                        <button class="quantity-btn" onclick="updateQuantity(2, 'increase')">+</button>
                        <span class="item-price">R$ 15,90</span>
                    </div>
                </div>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <h3>Total do Pedido:</h3>
		    <span class="total-price">R$ <? echo $total_price; ?></span>
                </div>
                <div class="cart-observations">
                    <textarea placeholder="Observações do pedido..."></textarea>
                </div>
            </div>
        </div>
        <div class="cart-modal-footer">
            <button class="cart-button" onclick="finalizarPedido()">Finalizar Pedido</button>
        </div>
    </div>
</div>

<style>
    .cart-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .cart-modal.show {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-modal-content {
        background-color: #fff;
        border-radius: 8px;
        width: 90%;
        max-width: 500px;
        max-height: 80vh;
        overflow-y: auto;
        position: relative;
    }

    .cart-modal-header {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ADB2D4;
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .cart-close {
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        color: white;
    }

    .cart-modal-body {
        padding: 15px;
    }

    .cart-item {
        border-bottom: 1px solid #eee;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-item-info h3 {
        margin: 0;
        color: #333;
        font-size: 16px;
    }

    .cart-item-info p {
        margin: 5px 0;
        color: #666;
        font-size: 14px;
    }

    .cart-item-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-btn {
        background-color: #ADB2D4;
        border: none;
        color: white;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
    }

    .quantity-btn:hover {
        background-color: #3E3F5B;
    }

    .item-quantity {
        min-width: 20px;
        text-align: center;
    }

    .item-price {
        min-width: 80px;
        text-align: right;
        color: #3E3F5B;
        font-weight: bold;
    }

    .cart-summary {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #eee;
    }

    .cart-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .total-price {
        font-size: 20px;
        font-weight: bold;
        color: #3E3F5B;
    }

    .cart-observations textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        resize: vertical;
        min-height: 60px;
    }

    .cart-modal-footer {
        padding: 15px;
        border-top: 1px solid #ddd;
        text-align: right;
    }

    .cart-button {
        background-color: #ADB2D4;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s;
    }

    .cart-button:hover {
        background-color: #3E3F5B;
        transform: scale(1.05);
    }
</style>

<script>
    // Função para mostrar o carrinho
    function showCart() {
        document.getElementById('cart-modal').classList.add('show');
    }

    // Função para esconder o carrinho
    function hideCart() {
        document.getElementById('cart-modal').classList.remove('show');
    }

    // Função para atualizar quantidade
    function updateQuantity(itemId, action) {
        const quantityElement = document.querySelector(`[onclick*="updateQuantity(${itemId}"]`)
            .parentElement.querySelector('.item-quantity');
        let quantity = parseInt(quantityElement.textContent);

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }

        quantityElement.textContent = quantity;
        updateTotal();
    }

    // Função para atualizar o total
    function updateTotal() {
        // Implementar cálculo do total baseado nos itens e quantidades
        // Esta é uma versão simplificada
        const total = 75.70; // Valor fixo para exemplo
        document.querySelector('.total-price').textContent = `R$ ${total.toFixed(2)}`;
    }

    // Função para finalizar pedido
    function finalizarPedido() {
        alert('Pedido finalizado com sucesso!');
        hideCart();
    }

    // Event listeners
    document.querySelector('.cart-close').addEventListener('click', hideCart);

    // Fechar o modal quando clicar fora dele
    window.addEventListener('click', (event) => {
        if (event.target === document.getElementById('cart-modal')) {
            hideCart();
        }
    });
</script> 
