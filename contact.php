<?php

include 'includes/header.php';
include 'includes/navbar.php';

?>

<?php
session_start();
?>

<!-- HERO -->

<section class="page-banner contact-banner">

    <div class="banner-overlay"></div>

    <div class="container">

        <div class="banner-content">

            <h1>CONTACT &nbsp; US</h1>

            <div class="breadcrumb-box">

                <a href="index.php">Home</a>

                <span>></span>

                <p>Contact Us</p>

            </div>

        </div>

        <div class="banner-line"></div>

    </div>

</section>

<!-- CONTACT PAGE -->

<section class="contact-page">

    <div class="container">

        <!-- TOP ROW -->

        <div class="row g-4 align-items-stretch">

            <!-- LEFT INFO -->

            <div class="col-lg-4">

                <div class="contact-info-box">

                    <h2>GET IN TOUCH</h2>

                    <div class="title-line"></div>

                    <!-- ITEM -->

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>

                            <h4>Address</h4>

                            <p>
                                Khabri, Mandi Dhanaura,
                                Amroha, Uttar Pradesh - 244221
                            </p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>

                            <h4>Phone</h4>

                            <p>+91 9536863170</p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>

                        <div>

                            <h4>WhatsApp</h4>

                            <p>+91 9536863170</p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>

                            <h4>Email</h4>

                            <p>school@gmail.com</p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div>

                            <h4>Working Hours</h4>

                            <p>
                                Monday - Saturday <br>
                                8:00 AM - 3:00 PM
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT MAP -->

            <div class="col-lg-8">

                <div class="contact-map">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.113815727814!2d78.15926687411029!3d28.983998168035992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390b9de9efe8c22f%3A0x13648c2e41d796e9!2sR%20B%20T%20Inter%20College%20Khawadi%20Amroha!5e0!3m2!1sen!2sin!4v1779113942447!5m2!1sen!2sin"
                        allowfullscreen=""
                        loading="lazy">

                    </iframe>

                </div>

            </div>

        </div>

        <!-- FORM ROW -->

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-form-box">

                    <h2>SEND US A MESSAGE</h2>

                    <div class="form-line"></div>

                    <?php if(isset($_GET['success'])){ ?>

                        <div class="alert alert-success">

                            Message Sent Successfully

                        </div>

                    <?php } ?>

                    <form action="save-contact.php"
                        method="POST">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-4">

                                    <input type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Your Name"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-4">

                                    <input type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Your Email"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-4">

                                    <input type="text"
                                        name="mobile"
                                        class="form-control"
                                        placeholder="Your Mobile Number"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-4">

                                    <input type="text"
                                        name="subject"
                                        class="form-control"
                                        placeholder="Subject"
                                        required>

                                </div>

                            </div>

                            <div class="col-lg-9">

                                <div class="mb-4">

                                    <textarea
                                        name="message"
                                        rows="5"
                                        class="form-control"
                                        placeholder="Your Message"
                                        required></textarea>

                                </div>

                            </div>

                            <div class="col-lg-3 d-flex align-items-end">

                                <button type="submit"
                                    name="submit"
                                    class="contact-btn">

                                    SEND MESSAGE

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'includes/foot.php'; ?>
<?php include 'includes/footer.php'; ?>