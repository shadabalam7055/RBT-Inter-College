<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/db.php';

$category = isset($_GET['category'])
? $_GET['category']
: 'All';

/* CATEGORY FILTER */

if($category == 'All'){

    $stmt = $pdo->prepare("
        SELECT * FROM gallery
        ORDER BY id DESC
    ");

    $stmt->execute();

}else{

    $stmt = $pdo->prepare("
        SELECT * FROM gallery
        WHERE category=?
        ORDER BY id DESC
    ");

    $stmt->execute([$category]);

}

$images = $stmt->fetchAll();
?>

<!-- HERO SECTION -->

<section class="page-banner gallery-banner">

    <div class="banner-overlay"></div>

    <div class="container">

        <div class="banner-content">

            <h1>GALLERY</h1>

            <div class="breadcrumb-box">

                <a href="index.php">Home</a>

                <span>></span>

                <p>Gallery</p>

            </div>
            <div class="banner-line"></div>
            </div>

        </div>

</section>

<!-- GALLERY -->

<section class="gallery-page-section">

    <div class="container">

        <!-- FILTER BUTTONS -->

        <div class="gallery-filter">

            <a href="gallery.php"
                class="<?= $category == 'All' ? 'active' : '' ?>">

                ALL

            </a>

            <a href="gallery.php?category=Result"
                class="<?= $category == 'Result' ? 'active' : '' ?>">

                RESULT / TOPPERS

            </a>

            <a href="gallery.php?category=15 August"
                class="<?= $category == '15 August' ? 'active' : '' ?>">

                15 AUGUST

            </a>

            <a href="gallery.php?category=26 January"
                class="<?= $category == '26 January' ? 'active' : '' ?>">

                26 JANUARY

            </a>

            <a href="gallery.php?category=Other"
                class="<?= $category == 'Other' ? 'active' : '' ?>">

                OTHER

            </a>

        </div>

        <!-- IMAGES -->

        <div class="gallery-page-grid">

            <?php foreach($images as $image){ ?>

                <a href="uploads/gallery/<?= $image['image'] ?>"
                    data-lightbox="gallery"
                    class="gallery-page-item">

                    <img src="uploads/gallery/<?= $image['image'] ?>">

                </a>

            <?php } ?>

        </div>

    </div>

</section>

<?php include 'includes/foot.php'; ?>
<?php include 'includes/footer.php'; ?>