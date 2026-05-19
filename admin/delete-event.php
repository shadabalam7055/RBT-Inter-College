<?php

require 'auth.php';
require '../includes/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM events
WHERE id=?
");

$stmt->execute([$id]);

$event = $stmt->fetch();

if($event){

    $imagePath =
    "../uploads/events/".$event['image'];

    if(file_exists($imagePath)){

        unlink($imagePath);
    }

    $deleteStmt = $pdo->prepare("
    DELETE FROM events
    WHERE id=?
    ");

    $deleteStmt->execute([$id]);
}

header("Location: manage-events.php");
exit;
?>