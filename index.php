<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<!-- CINEMATIC HERO SLIDER START -->

<section class="hero-slider-section">

    <div id="heroSlider"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="4000">

        <div class="carousel-inner">

            <?php

            include('includes/db.php');

            $sql = "SELECT * FROM info_slider
            WHERE status=1
            ORDER BY id DESC";

            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $active = true;

            foreach($sliders as $slider){

            ?>

            <div class="carousel-item <?php if($active){ echo 'active'; $active=false; } ?>">

                <!-- IMAGE -->

                <img src="assets/images/<?php echo $slider['image']; ?>"
                    class="d-block w-100 hero-image">

                <!-- OVERLAY -->

                <div class="hero-overlay"></div>

                <!-- CONTENT -->

                <div class="hero-content">

                    <div class="container">

                        <div class="hero-text-area">

                            <h5 class="hero-subtitle">

                                R B T INTER COLLEGE KHABRI DHANAURA

                            </h5>

                            <h1 class="hero-title">

                                BUILDING BRIGHT<br>
                                FUTURES FOR EVERY STUDENT

                            </h1>

                            <p class="hero-description">

                                R B T Inter College Khabri Dhanaura provides
                                quality education with discipline, experienced
                                teachers and a positive learning environment
                                to help every student achieve success.


                            </p>

                            <div class="hero-buttons">

                                <a href="admission.php" class="admission-btn">

                                    APPLY FOR ADMISSION

                                </a>

                                <a href="contact.php" class="hero-contact-btn">

                                    CONTACT US

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

        <!-- PREV -->

        <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <!-- NEXT -->

        <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>

<!-- CINEMATIC HERO SLIDER END -->

<!-- =========================
FEATURE SECTION
========================= -->

<section class="feature-section">

    <div class="container">

        <div class="row g-0">

            <?php

            require 'includes/db.php';

            $featureQuery =
            $pdo->query("SELECT * FROM school_features WHERE status = 1");

            while($feature = $featureQuery->fetch(PDO::FETCH_ASSOC)){

            ?>

            <div class="col-lg col-md-4 col-6">

                <div class="feature-box">

                    <div class="feature-icon">

                        <i class="fa-solid <?php echo $feature['icon']; ?>"></i>

                    </div>

                    <h4 class="feature-title">

                        <?php echo nl2br($feature['title']); ?>

                    </h4>

                    <p>

                        <?php echo $feature['description']; ?>

                    </p>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>



<!-- =========================
ABOUT + NOTICE SECTION
========================= -->

<section class="about-notice-section">

    <div class="container">

        <div class="row g-4">

            <!-- ABOUT -->

            <div class="col-lg-6">

                <div class="about-box">

                    <span class="section-subtitle">

                        WELCOME TO

                    </span>

                    <h2 class="section-title">

                        R B T INTER COLLEGE KHABRI DHANAURA

                    </h2>

                    <p class="about-text">

                        R B T Inter College Khabri Dhanaura
                        is committed to providing quality
                        education, discipline and overall
                        student development through modern
                        learning methods and experienced teachers.

                    </p>

                    <a href="about.php"
                    class="read-more-btn">

                        READ MORE ABOUT US

                    </a>

                </div>

            </div>

            <!-- NOTICE -->

            <div class="col-lg-6">

                <div class="notice-box">

                    <h2 class="notice-title">

                        LATEST NEWS & NOTICES

                    </h2>

                    <?php

                    $noticeQuery =
                    $pdo->query("
                        SELECT *
                        FROM news_notices
                        WHERE status = 1
                        ORDER BY notice_date DESC
                        LIMIT 4
                    ");

                    while($notice =
                    $noticeQuery->fetch(PDO::FETCH_ASSOC)){

                    ?>

                    <div class="notice-item">

                        <div class="notice-left">

                            <i class="fa-solid fa-bullhorn"></i>

                            <?php
                            echo $notice['title'];
                            ?>

                        </div>

                        <span>

                            <?php

                            echo date(
                                'd M, Y',
                                strtotime(
                                    $notice['notice_date']
                                )
                            );

                            ?>

                        </span>

                    </div>

                    <?php } ?>

                    <a href="notice.php"
                    class="notice-btn">

                        VIEW ALL NOTICES

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
GALLERY SECTION
========================= -->

<section class="gallery-section">

    <div class="container">

        <div class="section-header">

            <h2 class="gallery-heading">
                GALLERY HIGHLIGHTS
            </h2>

        </div>

        <div class="row g-4">

            <?php

            $galleryQuery =
            $pdo->query("
                SELECT *
                FROM gallery_images
                WHERE status = 1
                ORDER BY id DESC
                LIMIT 4
            ");

            while($gallery =
            $galleryQuery->fetch(PDO::FETCH_ASSOC)){

            ?>

            <div class="col-lg-3 col-md-6 col-6">

                <div class="gallery-box">

                    <a href="uploads/gallery/<?php
                    echo $gallery['image'];
                    ?>"

                    data-lightbox="school-gallery"

                    data-title="R B T Inter College">

                        <img src="uploads/gallery/<?php
                        echo $gallery['image'];
                        ?>"

                        class="gallery-img">

                    </a>

                </div>

            </div>

            <?php } ?>

        </div>

        <!-- VIEW FULL GALLERY BUTTON -->

        <div class="gallery-btn-area">

            <a href="gallery.php"
            class="gallery-page-btn">

                VIEW FULL GALLERY

            </a>

        </div>

    </div>

</section>

<!-- =========================
ENROLL SECTION
========================= -->

<section class="enroll-section">

    <div class="container">

        <div class="enroll-wrapper">

            <div class="row align-items-center">

                <!-- LEFT -->

                <div class="col-lg-7">

                    <div class="enroll-left">

                        <div class="enroll-icon">

                            <i class="fa-solid fa-paper-plane"></i>

                        </div>

                        <div>

                            <h2>

                                ENROLL YOUR CHILD TODAY

                            </h2>

                            <p>

                                Give them the best start
                                for a bright future

                            </p>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->

                <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">

                    <a href="admission.php"
                    class="apply-online-btn">

                        APPLY FOR ADMISSION

                    </a>

                </div>

            </div>

            <!-- STATS -->

            <div class="stats-area">

                <div class="row">

                    <div class="col-lg-3 col-6">

                        <div class="stat-box">

                            <h3>25+</h3>

                            <p>Years of Excellence</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="stat-box">

                            <h3>1000+</h3>

                            <p>Happy Students</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="stat-box">

                            <h3>20+</h3>

                            <p>Expert Teachers</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="stat-box">

                            <h3>100%</h3>

                            <p>Result Excellence</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<?php include('includes/footer.php'); ?>
<?php include('includes/foot.php'); ?>