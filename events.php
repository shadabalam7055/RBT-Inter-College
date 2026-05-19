<?php

include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/db.php';

$stmt = $pdo->prepare("
    SELECT * FROM events
    ORDER BY event_date DESC
");

$stmt->execute();

$events = $stmt->fetchAll();

?>

<!-- HERO -->

<section class="page-banner events-banner">

    <div class="banner-overlay"></div>

    <div class="container">

        <div class="banner-content">

            <h1>NEWS & EVENTS</h1>

            <div class="breadcrumb-box">

                <a href="index.php">Home</a>

                <span>></span>

                <p>Gallery</p>

            </div>

            <div class="banner-line"></div>

        </div>

    </div>

</section>

<!-- EVENTS -->

<section class="events-page-section">

    <div class="container">

        <?php foreach($events as $event){ ?>

            <div class="event-box">

                <!-- IMAGE -->

                <div class="event-image">

                    <img src="uploads/events/<?= $event['image'] ?>">

                </div>

                <!-- DATE -->

                <div class="event-date">

                    <h2>

                        <?= date('d',strtotime($event['event_date'])) ?>

                    </h2>

                    <p>

                        <?= strtoupper(date('M',strtotime($event['event_date']))) ?>

                    </p>

                </div>

                <!-- CONTENT -->

                <div class="event-content">

                    <h3>

                        <?= $event['title'] ?>

                    </h3>

                    <p>

                        <?= $event['description'] ?>

                    </p>

                    <a href="#">
                        READ MORE
                    </a>

                </div>

            </div>

        <?php } ?>

        <!-- BUTTON -->

        <div class="event-btn-box">

            <a href="#">
                VIEW ALL NEWS
            </a>

        </div>

    </div>

</section>

<?php include 'includes/foot.php'; ?>
<?php include 'includes/footer.php'; ?>