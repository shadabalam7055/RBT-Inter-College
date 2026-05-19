<?php

require 'auth.php';
require 'config.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $stmt = $pdo->prepare("
    DELETE FROM news_notices
    WHERE id=?
    ");

    $stmt->execute([$id]);
}

header("Location:manage-notices.php");

?>