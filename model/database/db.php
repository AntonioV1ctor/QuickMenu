<?php
$db_host="db";
$db_user = "root";
$db_password ="RootPassword";
$db_database = "QuickMenu";
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_database);

if($mysqli->error){
    die("Database connect erro!".$mysqli->error);
}

?>