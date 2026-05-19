<?php

include '../includes/db.php';

if(isset($_POST['submit'])){

    $category = $_POST['category'];

    $imageName = time().'_'.$_FILES['image']['name'];

    $tmpName = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmpName,
        "../uploads/gallery/".$imageName
    );

    $stmt = $pdo->prepare("
        INSERT INTO gallery(category,image)
        VALUES(?,?)
    ");

    $stmt->execute([$category,$imageName]);

    header("Location:add-gallery-image.php?success=1");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Add Gallery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

    <div class="card p-4 shadow">

        <h2 class="mb-4">
            Add Gallery Image
        </h2>

        <?php if(isset($_GET['success'])){ ?>

            <div class="alert alert-success">

                Image Uploaded Successfully

            </div>

        <?php } ?>

        <form method="POST"
            enctype="multipart/form-data">

            <div class="mb-3">

                <label class="mb-2">
                    Select Category
                </label>

                <select name="category"
                    class="form-select"
                    required>

                    <option value="">
                        Choose Category
                    </option>

                    <option value="Result">
                        Result / Toppers
                    </option>

                    <option value="15 August">
                        15 August
                    </option>

                    <option value="26 January">
                        26 January
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="mb-2">
                    Upload Image
                </label>

                <input type="file"
                    name="image"
                    class="form-control"
                    required>

            </div>

            <button type="submit"
                name="submit"
                class="btn btn-primary">

                Upload Image

            </button>

        </form>

    </div>

</div>

</body>
</html>