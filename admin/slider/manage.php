<?php

require '../auth.php';

include('../../includes/db.php');

$stmt = $pdo->prepare("
SELECT * FROM info_slider
ORDER BY id DESC
");

$stmt->execute();

$sliders = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage Hero Slider</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#f5f7fb;

    font-family:'Poppins',sans-serif;
}

.main-box{

    background:#fff;

    padding:35px;

    border-radius:24px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

.page-title{

    font-size:30px;

    font-weight:600;

    color:#071c3c;
}

.table img{

    width:220px;

    height:130px;

    object-fit:cover;

    border-radius:14px;

    border:1px solid #eee;
}

.btn-add{

    background:#071c3c;

    color:#fff;

    border:none;

    padding:12px 24px;

    border-radius:12px;

    text-decoration:none;

    font-size:15px;

    font-weight:500;

    transition:.3s;
}

.btn-add:hover{

    background:#d4a017;

    color:#071c3c;
}

.table{

    margin-top:25px;
}

.table th{

    background:#071c3c !important;

    color:#fff;

    font-weight:500;

    padding:16px;
}

.table td{

    vertical-align:middle;

    padding:18px;
}

.btn-delete{

    background:#dc3545;

    color:#fff;

    border:none;

    padding:10px 18px;

    border-radius:10px;

    font-size:14px;

    text-decoration:none;

    transition:.3s;
}

.btn-delete:hover{

    background:#bb2d3b;

    color:#fff;
}

.empty-box{

    text-align:center;

    padding:50px 20px;
}

.empty-box i{

    font-size:70px;

    color:#d4a017;

    margin-bottom:20px;
}

.empty-box h3{

    color:#071c3c;

    font-size:28px;

    margin-bottom:10px;
}

.empty-box p{

    color:#777;
}

@media(max-width:768px){

    .page-title{

        font-size:24px;
    }

    .table img{

        width:140px;

        height:90px;
    }

    .main-box{

        padding:20px;
    }
}

</style>

</head>

<body>

<div class="container py-5">

<div class="main-box">

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

<h2 class="page-title">

<i class="fa-solid fa-sliders me-2"></i>

Manage Hero Slider

</h2>

<a href="add.php"
class="btn-add">

<i class="fa-solid fa-plus me-2"></i>

Add New Slider

</a>

</div>

<?php if(count($sliders) > 0){ ?>

<div class="table-responsive">

<table class="table table-bordered align-middle">

<thead>

<tr>

<th>ID</th>

<th>Preview</th>

<th>Created</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($sliders as $slider){ ?>

<tr>

<td>

<?= $slider['id'] ?>

</td>

<td>

<img src="../../assets/images/<?= trim($slider['image']) ?>">

</td>

<td>

<?= date(
'd M Y',
strtotime($slider['created_at'])
) ?>

</td>

<td>

<a href="delete.php?id=<?= $slider['id'] ?>"
class="btn-delete"
onclick="return confirm('Delete this slider image?')">

<i class="fa-solid fa-trash"></i>

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php }else{ ?>

<div class="empty-box">

<i class="fa-solid fa-image"></i>

<h3>

No Slider Images Found

</h3>

<p>

Upload your first hero slider image.

</p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>