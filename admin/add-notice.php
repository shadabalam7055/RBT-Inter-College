<?php

require 'auth.php';
require 'config.php';

$message = "";

if(isset($_POST['submit'])){

    $title = $_POST['title'];

    $notice_date = $_POST['notice_date'];

    $status = $_POST['status'];

    $stmt = $pdo->prepare("
    INSERT INTO news_notices
    (title,notice_date,status)
    VALUES(?,?,?)
    ");

    $stmt->execute([
        $title,
        $notice_date,
        $status
    ]);

    $message = "Notice Added Successfully";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Notice</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

.main-box{

    background:#fff;

    padding:35px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

.btn-save{

    background:#071c3c;

    color:#fff;

    border:none;

    padding:13px 28px;

    border-radius:10px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="main-box">

<h2 class="mb-4">

<i class="fa-solid fa-bullhorn me-2"></i>

Add Notice

</h2>

<?php if($message){ ?>

<div class="alert alert-success">

<?= $message ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="mb-2">

Notice Title

</label>

<input type="text"
name="title"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="mb-2">

Notice Date

</label>

<input type="date"
name="notice_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="mb-2">

Status

</label>

<select name="status"
class="form-select">

<option value="1">

Active

</option>

<option value="0">

Inactive

</option>

</select>

</div>

<button type="submit"
name="submit"
class="btn-save">

Add Notice

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>