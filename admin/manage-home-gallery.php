<?php

require 'auth.php';
require '../includes/db.php';

$stmt = $pdo->prepare("
SELECT * FROM gallery_images
ORDER BY id DESC
");

$stmt->execute();

$images = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage Home Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{

    background:#f5f7fb;

    font-family:Poppins;
}

.gallery-box{

    background:#fff;

    padding:30px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

.table img{

    width:140px;

    height:90px;

    object-fit:cover;

    border-radius:12px;
}

.page-title{

    font-size:28px;

    font-weight:600;

    color:#071c3c;
}

.btn-add{

    background:#071c3c;

    color:#fff;

    border:none;

    padding:12px 20px;

    border-radius:10px;

    text-decoration:none;

    font-size:14px;

    font-weight:500;
}

.btn-add:hover{

    background:#d4a017;

    color:#071c3c;
}

</style>

</head>

<body>

<div class="container py-5">

    <div class="gallery-box">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="page-title">

                Home Gallery Images

            </h2>

            <a href="add-gallery.php"
            class="btn-add">

                Add New Image

            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Image</th>

                        <th>Created</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($images as $image){ ?>

                    <tr>

                        <td>

                            <?= $image['id'] ?>

                        </td>

                        <td>

                            <img src="../uploads/gallery/<?= $image['image'] ?>">

                        </td>

                        <td>

                            <?= date(
                                'd M Y',
                                strtotime($image['created_at'])
                            ) ?>

                        </td>

                        <td>

                            <a href="delete-home-gallery.php?id=<?= $image['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this image?')">

                                <i class="fa-solid fa-trash"></i>

                                Delete

                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>