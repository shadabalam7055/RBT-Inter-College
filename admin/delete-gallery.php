<?php

require 'auth.php';
require '../includes/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM gallery
WHERE id=?
");

$stmt->execute([$id]);

$image = $stmt->fetch();

if($image){

    $path =
    "../uploads/gallery/".$image['image'];

    if(file_exists($path)){

        unlink($path);
    }

    $deleteStmt = $pdo->prepare("
    DELETE FROM gallery
    WHERE id=?
    ");

    $deleteStmt->execute([$id]);
}

header("Location: manage-gallery.php");
exit;
?>