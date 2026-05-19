<?php

require '../auth.php';

include('../../includes/db.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    /* FETCH IMAGE */

    $stmt = $pdo->prepare("
    SELECT * FROM info_slider
    WHERE id=?
    ");

    $stmt->execute([$id]);

    $slider = $stmt->fetch();

    if($slider){

        $imagePath =
        "../../assets/images/".
        trim($slider['image']);

        /* DELETE IMAGE */

        if(file_exists($imagePath)){

            unlink($imagePath);
        }

        /* DELETE DATABASE */

        $deleteStmt = $pdo->prepare("
        DELETE FROM info_slider
        WHERE id=?
        ");

        $deleteStmt->execute([$id]);
    }
}

header("Location:manage.php");
exit;
?>