<?php

require 'auth.php';

require '../includes/db.php';

/* ONLY SUPER ADMIN */

if($_SESSION['role'] != 'super_admin'){

    header("Location:dashboard.php");
    exit;
}

$stmt = $pdo->prepare("
SELECT * FROM admins
ORDER BY id DESC
");

$stmt->execute();

$admins = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Admins</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

img{
    width:60px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="card shadow border-0 p-4 rounded-4">

<h2 class="mb-4">

Manage Admins

</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Username</th>

<th>Role</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($admins as $admin){ ?>

<tr>

<td>

<?= $admin['id'] ?>

</td>

<td>

<?= $admin['username'] ?>

</td>

<td>

<?= $admin['role'] ?>

</td>

<td>

<?php if($admin['username'] != 'admin'){ ?>

<a href="delete-admin.php?id=<?= $admin['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Admin?')">

Delete

</a>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>