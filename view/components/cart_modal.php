<?php
//include_once(__DIR__ . '/../../../model/database/db.php');
//session_start();
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$cart_count = count($_SESSION['cart']);

// get total price 
$items_m = [];
//$items_d = [];
$total_price = 0;
foreach ($_SESSION['cart'] as $c_item) {
	$c_data = $sql_db->query('SELECT * FROM menu WHERE id = ' . $c_item . ';')->fetch_assoc();
	//$c_d_data = $sql_db->query('SELECT * FROM menu_description WHERE id = ' . $c_item . ';')->fetch_assoc();
	
	$items_m[] = $c_data;
	//$items_d[] = $c_d_data;
	$total_price += $c_data['item_price'];
}

// new array to display 
$cart_display = array_count_values($_SESSION['cart']);

?>
<div id="cart-modal" class="cart-modal">
    <div class="cart-modal-content">
        <div class="cart-modal-header">
            <h2>Seu Pedido</h2>
            <span class="cart-close">&times;</span>
        </div>
	<div class="cart-modal-body">
	    <div class="cart-items">

		<?php foreach ($cart_display as $i_id => $i_val) { 
		$ci_data = $sql_db->query('SELECT * FROM menu WHERE id = ' . $i_id . ';')->fetch_assoc();
		$ci_data_desc = $sql_db->query('SELECT * FROM menu_description WHERE id = '. $i_id .';')->fetch_assoc();	
		?>
                <div class="cart-item">
		<div class="cart-item-info">
		    	<h3><? echo $ci_data['item_name']; ?></h3>
                    </div>
                    <div class="cart-item-actions">
                        
			<button class="quantity-btn" onclick="updateQuantity(this, 'decrease')">-</button>
			<span class="item-quantity" name="<? echo $i_id; ?>"><? echo $i_val; ?></span>
			<button class="quantity-btn" onclick="updateQuantity(this, 'increase')">+</button>
			<span class="item-price"><? echo $ci_data['item_price']; ?></span>

                    </div>
		</div>
		<? } ?>
            </div>

            <div class="cart-summary">
                <div class="cart-total">
                    <h3>Total do Pedido:</h3>
		    <span class="total-price">R$ <? echo $total_price; ?></span>
                </div>
                <div class="cart-observations">
                    <textarea id='order_note' placeholder="Observações do pedido..."></textarea>
                </div>
            </div>
        </div>
        <div class="cart-modal-footer">
        <? if ($cart_display) { echo '<button class="cart-button" onclick="finalizarPedido()">Finalizar Pedido</button>'; } ?>
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
        font-size: 16px;
    }

    .cart-button:hover {
        background-color: #3E3F5B;
        transform: scale(1.05);
    }

    .ver-carrinho-btn {
    	position: fixed; 
    	bottom: 20px;     
    	right: 20px;      
    	padding: 12px 20px;
    	background-color: #ADB2D4;
    	color: white;
    	border: none;
    	border-radius: 6px;
    	cursor: pointer;
    	z-index: 9999;
    	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .ver-carrinho-btn:hover {
        background-color: #3E3F5B;
    }



</style>

<script>
    // don't mind the language switch in update_total
    // its because i(danilo) like to write the stuff in my code in english

    // save data in object everytime updateTotal() is called
    all_order_data = [];
    
    // Função para mostrar o carrinho
    function showCart() {
        document.getElementById('cart-modal').classList.add('show');
    }

    // Função para esconder o carrinho
    function hideCart() {
        document.getElementById('cart-modal').classList.remove('show');
    }

    // Função para atualizar quantidade
    
    function updateQuantity(button, action) {
        const container = button.parentElement; 
        const quantityElement = container.querySelector('.item-quantity');
        let quantity = parseInt(quantityElement.textContent);

        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 0) {
            quantity--;
        }

        quantityElement.textContent = quantity;

        updateTotal(); 
    }


    // Função para atualizar o total
    
    function updateTotal() {
        const price_nodes = document.querySelectorAll('.item-price');
        const p_multi = document.querySelectorAll('.item-quantity');

	all_order_data.splice(0, all_order_data.length)
	all_order_data = []

	let total_price = 0;

        for (let i = 0; i < p_multi.length; i++) {
            let price = parseFloat(price_nodes[i].textContent);
            let multi = parseInt(p_multi[i].textContent);

            if (isNaN(price) || isNaN(multi)) {
            console.warn(`Invalid data at index ${i}: price='${price_nodes[i].textContent}', quantity='${p_multi[i].textContent}'`);
                continue;
	    }
	    
	    
    	    all_order_data.push({[p_multi[i].getAttribute('name')]: multi})
            total_price += price * multi;
        }

        document.querySelector('.total-price').textContent = `R$ ${total_price.toFixed(2)}`;
        console.log(all_order_data)
    }
    updateTotal()

    // Função para finalizar pedido
    
function finalizarPedido() {
    // Enviar pedido para backend
    const formData = new FormData();
    const note_n = document.getElementById("order_note");

    console.log("Order Note:", note_n.value);
    
    formData.append('order_data', JSON.stringify(all_order_data));
    formData.append('order_note', note_n.value);

    const url = window.location.pathname;
    console.log("Sending POST request to:", url);  // Log the URL where the POST is being sent

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(res => {
        console.log('Response status:', res.status);  // Log the response status
        return res.text();
    })
    .then(data => {
        console.log('Server response:', data);
        alert('Pedido finalizado com sucesso!');
	hideCart();
	location.reload()
    })
    .catch(error => {
        console.error('Erro ao enviar pedido:', error);
    });
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
