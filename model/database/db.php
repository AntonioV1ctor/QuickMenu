<?php
    // db config
    $service_name = 'db';
    $username = 'root';
    $password = 'RootPassword';
    $db_name = 'QuickMenu';

    $conn = new mysqli($service_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die('db connection failed: '. $conn->connect_error);
    }
?>