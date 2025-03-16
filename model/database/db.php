<?php
    // db config

    $service_name = 'mysql'; // change if remote database
    $username = 'root';
    $password = 'RootPassword';
    $db_name = 'QuickMenu';

    $conn = new mysqli($service_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        echo 'db connection failed: '. $conn->connect_error;
    } else {
        echo "connected to db!!";
    }


?>