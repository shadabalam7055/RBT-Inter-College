<?php

require '../includes/db.php';

if(isset($_POST['submit'])){

    $icon = $_POST['icon'];

    $title = $_POST['title'];

    $description = $_POST['description'];

    $stmt = $pdo->prepare("
        INSERT INTO school_features
        (icon,title,description)
        VALUES
        (?,?,?)
    ");

    $stmt->execute([
        $icon,
        $title,
        $description
    ]);

    header("Location:add-feature.php");
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Feature</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    <h3>Add Feature</h3>

                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label>

                                Font Awesome Icon

                            </label>

                            <input type="text"
                            name="icon"
                            class="form-control"
                            placeholder="fa-users"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>

                                Title

                            </label>

                            <input type="text"
                            name="title"
                            class="form-control"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>

                                Description

                            </label>

                            <textarea name="description"
                            class="form-control"
                            rows="4"
                            required></textarea>

                        </div>

                        <button type="submit"
                        name="submit"
                        class="btn btn-dark">

                            Add Feature

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>