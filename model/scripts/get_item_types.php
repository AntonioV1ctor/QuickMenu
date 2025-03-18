<?php
// for some reason i get a error trying to include db.php
//include '../database/db.php';

$service_name = 'db';
$username = 'root';
$password = 'RootPassword';
$db_name = 'QuickMenu';

$sql_db = new mysqli($service_name, $username, $password, $db_name);

if ($sql_db->connect_error) {
    die('db connection failed: '. $sql_db->connect_error);
}

// the last type will be aways the miscalenius/undefined type
$item_types = [];

$menu_type_collums = $sql_db->query('SELECT item_type FROM menu;');

if ($menu_type_collums->num_rows > 0) {
    while($row = $menu_type_collums->fetch_assoc()) {
        $item_types[] = $row['item_type'];
    }
}

// counts the difrent types of... types
$t_count = count($item_types);
?>