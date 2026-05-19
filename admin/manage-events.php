<?php

require 'auth.php';
require '../includes/db.php';

$stmt = $pdo->prepare("
SELECT * FROM events
ORDER BY id DESC
");

$stmt->execute();

$events = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Events</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

.table-box{

    background:#fff;

    padding:30px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

img{
    width:120px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="container py-5">

    <div class="table-box">

        <div class="d-flex justify-content-between mb-4">

            <h2>Manage Events</h2>

            <a href="add-event.php"
            class="btn btn-dark">

                Add Event

            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($events as $event){ ?>

                    <tr>

                        <td>
                            <?= $event['id'] ?>
                        </td>

                        <td>

                            <img src="../uploads/events/<?= $event['image'] ?>">

                        </td>

                        <td>

                            <?= $event['title'] ?>

                        </td>

                        <td>

                            <?= $event['event_date'] ?>

                        </td>

                        <td>

                            <a href="delete-event.php?id=<?= $event['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this event?')">

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