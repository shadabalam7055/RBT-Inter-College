<?php

require '../auth.php';

include('../../includes/db.php');

$message = "";

if(isset($_POST['submit'])){

    if(isset($_FILES['image']) &&
    $_FILES['image']['error'] == 0){

        $imageName =
        $_FILES['image']['name'];

        $tmpName =
        $_FILES['image']['tmp_name'];

        $extension = strtolower(
            pathinfo(
                $imageName,
                PATHINFO_EXTENSION
            )
        );

        $allowed =
        ['jpg','jpeg','png','webp'];

        if(in_array($extension,$allowed)){

            $newImageName =
            time().'_'.rand(1111,9999).
            '.'.$extension;

            /* IMAGE UPLOAD */

            move_uploaded_file(

                $tmpName,

                "../../assets/images/".
                $newImageName
            );

            /* INSERT DATABASE */

            $stmt = $pdo->prepare("
            INSERT INTO info_slider(image)
            VALUES(?)
            ");

            $stmt->execute([
                $newImageName
            ]);

            $message =
            "Slider Added Successfully";

        }else{

            $message =
            "Only JPG PNG WEBP Allowed";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Add Hero Slider</title>

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

    border-radius:22px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

.page-title{

    font-size:30px;

    font-weight:600;

    color:#071c3c;

    margin-bottom:30px;
}

.form-control{

    height:55px;

    border-radius:12px;
}

.btn-upload{

    background:#071c3c;

    color:#fff;

    border:none;

    padding:14px 30px;

    border-radius:12px;

    font-weight:500;

    transition:.3s;
}

.btn-upload:hover{

    background:#d4a017;

    color:#071c3c;
}

.preview-box{

    display:none;

    margin-top:20px;
}

.preview-box img{

    width:100%;

    height:320px;

    object-fit:cover;

    border-radius:18px;
}

.alert{

    border-radius:12px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="main-box">

<h2 class="page-title">

<i class="fa-solid fa-plus me-2"></i>

Add Hero Slider

</h2>

<?php if($message != ""){ ?>

<div class="alert alert-success">

<?= $message ?>

</div>

<?php } ?>

<form method="POST"
enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">

Choose Slider Image

</label>

<input type="file"
name="image"
class="form-control"
id="imageInput"
required>

</div>

<!-- PREVIEW -->

<div class="preview-box"
id="previewBox">

<img id="previewImage">

</div>

<button type="submit"
name="submit"
class="btn-upload mt-4">

<i class="fa-solid fa-upload me-2"></i>

Upload Slider

</button>

</form>

</div>

</div>

</div>

</div>

<script>

const imageInput =
document.getElementById('imageInput');

const previewBox =
document.getElementById('previewBox');

const previewImage =
document.getElementById('previewImage');

imageInput.addEventListener('change',function(e){

    const file = e.target.files[0];

    if(file){

        previewBox.style.display='block';

        previewImage.src =
        URL.createObjectURL(file);
    }

});

</script>

</body>
</html>