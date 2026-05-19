<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php
session_start();
?>

<!-- HERO -->

<section class="admission-hero">

    <div class="admission-overlay"></div>

    <div class="container">

        <div class="admission-hero-content">

            <h1>ADMISSIONS</h1>

            <div class="admission-breadcrumb">

                <a href="index.php">Home</a>

                <span>
                    <i class="fa-solid fa-angle-right"></i>
                </span>

                <p>Admissions</p>

            </div>

            <div class="banner-line"></div>

        </div>

        <div class="banner-line"></div>

    </div>

</section>

<!-- ADMISSION SECTION -->

<section class="admission-section">

    <div class="container">

        <div class="row gy-4">

            <!-- LEFT -->

            <div class="col-lg-5">

                <!-- PROCESS -->

                <div class="admission-box">

                    <h2>ADMISSION PROCESS</h2>

                    <div class="process-item">

                        <div class="process-number">
                            01
                        </div>

                        <div>

                            <h4>Fill the Enquiry Form</h4>

                            <p>
                                Fill the online admission enquiry
                                form or visit the school office.
                            </p>

                        </div>

                    </div>

                    <div class="process-item">

                        <div class="process-number">
                            02
                        </div>

                        <div>

                            <h4>Documents Verification</h4>

                            <p>
                                Submit the required documents
                                for verification.
                            </p>

                        </div>

                    </div>

                    <div class="process-item">

                        <div class="process-number">
                            03
                        </div>

                        <div>

                            <h4>Interaction / Assessment</h4>

                            <p>
                                Student interaction or
                                assessment (if applicable).
                            </p>

                        </div>

                    </div>

                    <div class="process-item last-process">

                        <div class="process-number">
                            04
                        </div>

                        <div>

                            <h4>Confirmation</h4>

                            <p>
                                On successful verification,
                                admission will be confirmed.
                            </p>

                        </div>

                    </div>

                </div>

                <!-- DOCUMENTS -->

                <div class="admission-box mt-4">

                    <h2>DOCUMENTS REQUIRED</h2>

                    <ul class="document-list">

                        <li>
                            <i class="fa-regular fa-circle-check"></i>
                            Birth Certificate
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>
                            Aadhaar Card (Student)
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>
                            Previous Class Report Card
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>
                            Passport Size Photographs
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>
                            Transfer Certificate (If applicable)
                        </li>

                    </ul>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-7">

                <!-- FORM -->

                <div class="admission-form-box">

                    <h2>ENQUIRE NOW</h2>

                    <?php if(isset($_SESSION['success'])): ?>

<div class="alert alert-success">

    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    ?>

</div>

<?php endif; ?>

                    <form action="save-enquiry.php" method="POST">

    <div class="mb-3">

        <label>Student Name</label>

        <input type="text"
            name="student_name"
            class="form-control"
            placeholder="Enter student name"
            required>

    </div>

    <div class="mb-3">

        <label>Parent Name</label>

        <input type="text"
            name="parent_name"
            class="form-control"
            placeholder="Enter parent name"
            required>

    </div>

    <div class="mb-3">

        <label>Class Applying for</label>

        <select class="form-select"
            name="class_applying"
            required>

            <option value="">Select Class</option>

            <option>Nursery</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
            <option>7th</option>
            <option>8th</option>
            <option>9th</option>
            <option>10th</option>
            <option>11th</option>
            <option>12th</option>

        </select>

    </div>

    <div class="mb-3">

        <label>Mobile Number</label>

        <input type="text"
            name="mobile"
            class="form-control"
            placeholder="Enter mobile number"
            required>

    </div>

    <div class="mb-3">

        <label>Email Address</label>

        <input type="email"
            name="email"
            class="form-control"
            placeholder="Enter email address">

    </div>

    <div class="mb-3">

        <label>Address</label>

        <input type="text"
            name="address"
            class="form-control"
            placeholder="Enter address">

    </div>

    <div class="mb-3">

        <label>Message (Optional)</label>

        <textarea class="form-control"
            name="message"
            rows="4"
            placeholder="Enter your message"></textarea>

    </div>

    <button type="submit"
        class="submit-btn">

        SUBMIT ENQUIRY

    </button>

</form>

                </div>

                <!-- APPLY BOX -->

                <div class="apply-box">

                    <div class="apply-icon">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>

                    <h2>

                        ADMISSION OPEN <br>
                        FOR SESSION 2025-26

                    </h2>

                    <p>
                        Limited Seats Available!
                    </p>

                    <a href="#">

                        APPLY NOW

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'includes/foot.php'; ?>
<?php include 'includes/footer.php'; ?>