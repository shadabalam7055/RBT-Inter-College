<?php

require 'auth.php';

require '../includes/db.php';

/* ONLY SUPER ADMIN */

if($_SESSION['role'] != 'super_admin'){

    header("Location:dashboard.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("
DELETE FROM admins
WHERE id=?
");

$stmt->execute([$id]);

header("Location:manage-admins.php");
exit;
?>