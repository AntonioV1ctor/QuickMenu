<?php
include_once __DIR__ . "/../database/db.php";

// the last type will be aways the miscalenius/undefined type
$item_types = [];

$menu_type_collums = $sql_db->query('SELECT item_type FROM menu;');

if ($menu_type_collums->num_rows > 0) {
    while($row = $menu_type_collums->fetch_assoc()) {
    	$match = false;
    	foreach ($item_types as $type) {
            if ($row['item_type'] == $type) {$match = true;}
    	}
        if (!$match) {$item_types[] = $row['item_type'];}
        
    }
}

// counts the difrent types of... types
$t_count = count($item_types);
?>