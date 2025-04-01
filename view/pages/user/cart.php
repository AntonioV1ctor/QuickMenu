<?php include_once('./../../../model/scripts/check-session.php'); ?>
<?php
//session_start(); // already used in check-session.php

echo 'user:'. $_SESSION['user_id'];
?>


