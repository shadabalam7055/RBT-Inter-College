<?php

require 'auth.php';
require 'config.php';

$stmt = $pdo->prepare("
SELECT * FROM news_notices
ORDER BY id DESC
");

$stmt->execute();

$notices = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Notices</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

.main-box{

    background:#fff;

    padding:30px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.btn-delete{

    background:red;

    color:#fff;

    padding:8px 15px;

    border-radius:8px;

    text-decoration:none;
}

.btn-delete:hover{

    color:#fff;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="main-box">

<h2 class="mb-4">

Manage Notices

</h2>

<div class="table-responsive">

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>

<th>Title</th>

<th>Date</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($notices as $notice){ ?>

<tr>

<td>

<?= $notice['id'] ?>

</td>

<td>

<?= $notice['title'] ?>

</td>

<td>

<?= $notice['notice_date'] ?>

</td>

<td>

<?php

if($notice['status']==1){

    echo "Active";

}else{

    echo "Inactive";
}

?>

</td>

<td>

<a href="delete-notice.php?id=<?= $notice['id'] ?>"
class="btn-delete"
onclick="return confirm('Delete Notice?')">

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