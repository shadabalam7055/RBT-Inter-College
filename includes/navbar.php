<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>


<nav class="navbar navbar-expand-lg custom-navbar">

    <div class="container">

        <!-- LOGO -->

        <a class="navbar-brand d-flex align-items-center" href="#">

            <img src="assets/images/logo.png" alt="logo" class="logo">

            <div class="logo-text">

                <h3>R B T INTER COLLEGE</h3>
                <h3>KHABRI DHANAURA</h3>

            </div>

        </a>

        <!-- MOBILE BTN -->

        <button class="navbar-toggler bg-warning"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : ''; ?>" href="index.php">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'about.php') ? 'active' : ''; ?>" href="about.php">ABOUT US</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'academics.php') ? 'active' : ''; ?>" href="academics.php">ACADEMICS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'admission.php') ? 'active' : ''; ?>" href="admission.php">ADMISSION</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'facilities.php') ? 'active' : ''; ?>" href="facilities.php">FACILITIES</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'gallery.php') ? 'active' : ''; ?>" href="gallery.php">GALLERY</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'events.php') ? 'active' : ''; ?>" href="events.php">EVENTS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'contact.php') ? 'active' : ''; ?>" href="contact.php">CONTACT</a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a href="admission.php" class="apply-btn">
                        APPLY NOW
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>