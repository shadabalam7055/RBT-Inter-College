<?php

require '../includes/db.php';

if(isset($_POST['submit'])){

    $imageName =
    time().'_'.$_FILES['image']['name'];

    $tmpName =
    $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmpName,
        "../uploads/gallery/".$imageName
    );

    $stmt =
    $pdo->prepare("
        INSERT INTO gallery_images(image)
        VALUES(?)
    ");

    $stmt->execute([$imageName]);

    header("Location:add-gallery.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="card shadow">

<div class="card-header bg-dark text-white">

<h3>Add Gallery Image</h3>

</div>

<div class="card-body">

<form method="POST"
enctype="multipart/form-data">

<div class="mb-3">

<label>Gallery Image</label>

<input type="file"
name="image"
class="form-control"
required>

</div>

<button type="submit"
name="submit"
class="btn btn-dark">

Upload Image

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>