<?php

require 'auth.php';
require '../includes/db.php';

$stmt = $pdo->prepare("
SELECT * FROM school_features
ORDER BY id DESC
");

$stmt->execute();

$features = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Features</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f7fb;font-family:Poppins;">

<div class="container py-5">

<div class="card shadow border-0 p-4 rounded-4">

<h2 class="mb-4">
Manage Features
</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Icon</th>
<th>Title</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($features as $feature){ ?>

<tr>

<td>
<?= $feature['id'] ?>
</td>

<td>

<i class="fa-solid <?= $feature['icon'] ?>"></i>

</td>

<td>

<?= $feature['title'] ?>

</td>

<td>

<a href="delete-feature.php?id=<?= $feature['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete feature?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>