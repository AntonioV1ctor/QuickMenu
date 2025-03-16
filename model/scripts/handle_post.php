<?php
    /*if (isset($_POST['password'])) {
        echo $_POST['password'];
        setcookie('user-token', 'very real token', time() + 3600, '/', '');
    };*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        setcookie('user-token', $_POST['password'], time() + 3600, '/', '');
        header('Location: /', true, 302);
        exit();
    }
    
?>