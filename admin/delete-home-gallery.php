<?php

require 'auth.php';
require '../includes/db.php';

$id = $_GET['id'];

/* FETCH IMAGE */

$stmt = $pdo->prepare("
SELECT * FROM gallery_images
WHERE id=?
");

$stmt->execute([$id]);

$image = $stmt->fetch();

/* DELETE IMAGE */

if($image){

    $imagePath =
    "../uploads/gallery/".$image['image'];

    if(file_exists($imagePath)){

        unlink($imagePath);
    }

    $deleteStmt = $pdo->prepare("
    DELETE FROM gallery_images
    WHERE id=?
    ");

    $deleteStmt->execute([$id]);
}

header("Location: manage-home-gallery.php");
exit;
?>