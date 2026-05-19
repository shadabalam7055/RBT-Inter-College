<?php

include '../includes/db.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];

    $description = $_POST['description'];

    $event_date = $_POST['event_date'];

    $imageName = time().'_'.$_FILES['image']['name'];

    $tmpName = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmpName,
        "../uploads/events/".$imageName
    );

    $stmt = $pdo->prepare("
        INSERT INTO events(title,description,event_date,image)
        VALUES(?,?,?,?)
    ");

    $stmt->execute([
        $title,
        $description,
        $event_date,
        $imageName
    ]);

    header("Location:add-event.php?success=1");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Add Event</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Add News / Event
        </h2>

        <?php if(isset($_GET['success'])){ ?>

            <div class="alert alert-success">

                Event Added Successfully

            </div>

        <?php } ?>

        <form method="POST"
            enctype="multipart/form-data">

            <div class="mb-3">

                <label class="mb-2">
                    Event Title
                </label>

                <input type="text"
                    name="title"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="mb-2">
                    Description
                </label>

                <textarea name="description"
                    class="form-control"
                    rows="5"
                    required></textarea>

            </div>

            <div class="mb-3">

                <label class="mb-2">
                    Event Date
                </label>

                <input type="date"
                    name="event_date"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="mb-2">
                    Event Image
                </label>

                <input type="file"
                    name="image"
                    class="form-control"
                    required>

            </div>

            <button type="submit"
                name="submit"
                class="btn btn-primary">

                Add Event

            </button>

        </form>

    </div>

</div>

</body>
</html>