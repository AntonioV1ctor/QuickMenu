<?php
// db config
$service_name = 'db';
$username = 'root';
$password = 'RootPassword';
$db_name = 'QuickMenu';

$sql_db = new mysqli($service_name, $username, $password, $db_name);

if ($sql_db->connect_error) {
    die('db connection failed: '. $sql_db->connect_error);
}
?>