<?php

session_start();

/* Prevent cache */
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if(!isset($_SESSION['admin'])){

    header("Location: login.php");
    exit;
}
?>