<?php

require 'auth.php';
require '../includes/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
DELETE FROM school_features
WHERE id=?
");

$stmt->execute([$id]);

header("Location: manage-features.php");
exit;
?>