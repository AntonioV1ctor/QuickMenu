<?php include_once "./../../../model/database/db.php"; ?>
<?php
// handle removing orders
if (isset($_POST['delete-order'])) {
	$sql_db->query('DELETE FROM order_items WHERE order_id='. $_POST['delete-order'] .';');
	$sql_db->query('DELETE FROM orders WHERE id='. $_POST['delete-order'] .';');
}

?>
<?php
$total_p = [];

// get pending orders
$orders = [];
$o_data = [];

$o_buff = $sql_db->query("SELECT * FROM orders");
while ($row = $o_buff->fetch_assoc()) {
	$orders[] = $row; 
}
foreach ($orders as $index => $order) {
    $o_dat = $sql_db->query("SELECT * FROM order_items WHERE order_id = " . $order['id']);
    $tp = 0;
    
    while ($row = $o_dat->fetch_assoc()) {
	$o_data[$index][] = $row;
	$t_buff = $sql_db->query('SELECT item_price FROM menu WHERE id ='. $row['item_id'] .';')->fetch_assoc();

	$tp += $t_buff['item_price'] * $row['quantity'];
    }
    $total_p[] = $tp; 
}
/*echo $total_p[1];
echo $orders[0]['user_note'];
echo $o_data[0][1]['item_id'];*/
?>

<?php include_once "./../../components/head.php"; ?>
</head>

<body>
    <?php include_once('./../../components/chief_navbar.php'); ?>
    <div class="chief-options-container">
        <div class="chief-options-box">

            <div class="chief-head-title">
                <i id="menu-options-icon" class="fa-solid fa-arrow-left"></i>
                <h1 class="chief-tltle-text">Pedidos Ativos</h1>
	    </div>
	    <div style="overflow-x: auto; max-width: 100%;">
            <table class="pedidos-table">
                <thead>
                    <tr>
                        <th>Mesa</th>
                        <th>Pedido</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
		    <!-- Danilo, aqui voce vai ter que fazer um modo de ler o banco de dados e subistituir esse modal pelos valores do Db. -->
		    <?php for ($i = 0; $i < count($orders); $i++) { ?>
                    <tr>
                        <td>00</td>
			<td><?php 
			$strr = '';
			$ead = [];
			foreach ($o_data[$i] as $oi_row) {
				$ead_buff = $sql_db->query('SELECT item_name FROM menu WHERE id ='. $oi_row['item_id'] .';')->fetch_assoc();
				$strr .= 'x'. $oi_row['quantity'] .' - <b>'. $ead_buff['item_name'] .'</b>'."<br>";
			}
			$strr .= "<i>". $orders[$i]['user_note'] ."</i>";
			echo $strr;
			?></td>
			<td>R$ <? echo $total_p[$i]; ?></td>
                        <td><span class="status-pendente">Pendente</span></td>
			<td>
			    <form action='' method='post'>
			        <input type='hidden' name='delete-order' value='<? echo $orders[$i]['id']; ?>'>
			        <button class="action-button" type="submit">Finalizar</button>
			    </form>
                            
                        </td>
		    </tr>
		    <? } ?>
                </tbody>
	    </table>
	    </div>
        </div>
    </div>
    <script src="/view/assets/js/menu.js"></script>
    <?php include_once "./../../components/footer.php"; ?>
</body>

</html>
