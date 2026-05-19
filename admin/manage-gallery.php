<?php

require 'auth.php';
require '../includes/db.php';

$stmt = $pdo->prepare("
SELECT * FROM gallery
ORDER BY id DESC
");

$stmt->execute();

$images = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

img{

    width:120px;
    height:80px;

    object-fit:cover;

    border-radius:10px;
}

</style>

</head>

<body style="background:#f5f7fb;font-family:Poppins;">

<div class="container py-5">

<div class="card shadow border-0 p-4 rounded-4">

<h2 class="mb-4">
Manage Gallery Images
</h2>

<div class="table-responsive">

<table class="table table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Image</th>
<th>Category</th>
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

<?= $image['category'] ?>

</td>

<td>

<a href="delete-gallery.php?id=<?= $image['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete image?')">

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