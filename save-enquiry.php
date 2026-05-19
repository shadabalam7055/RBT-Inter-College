<?php

require 'includes/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $student_name = $_POST['student_name'];
    $parent_name = $_POST['parent_name'];
    $class_applying = $_POST['class_applying'];

    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // DATABASE INSERT

    $stmt = $pdo->prepare("

        INSERT INTO admission_enquiries
        (
            student_name,
            parent_name,
            class_applying,
            mobile,
            email,
            address,
            message
        )

        VALUES (?, ?, ?, ?, ?, ?, ?)

    ");

    $stmt->execute([
        $student_name,
        $parent_name,
        $class_applying,
        $mobile,
        $email,
        $address,
        $message
    ]);

    // EMAIL SEND

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'shadabalam7055@gmail.com';

        $mail->Password = 'cdrnuzpzgvfxobwn';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->SMTPSecure = 'tls';

        $mail->Port = 587;

        // FROM

        $mail->setFrom(
            'shadabalam7055@gmail.com',
            'RBT Inter College'
        );

        // TO

        $mail->addAddress('shadabalam7248@gmail.com');

        // EMAIL FORMAT

        $mail->isHTML(true);

        $mail->Subject = "New Admission Enquiry - RBT Inter College";

$mail->Body = '

<div style="background:#f4f6f9;padding:40px 20px;font-family:Poppins,Arial,sans-serif;">

    <div style="
        max-width:700px;
        margin:auto;
        background:#ffffff;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 10px 40px rgba(0,0,0,0.12);
    ">

        <!-- TOP HEADER -->

        <div style="
            background:linear-gradient(135deg,#021b46,#033b8c);
            padding:35px;
            text-align:center;
            color:white;
        ">

            <img src=\"https://cdn-icons-png.flaticon.com/512/3135/3135755.png\"
                 width=\"80\"
                 style=\"margin-bottom:15px;\">

            <h1 style="
                margin:0;
                font-size:34px;
                font-weight:700;
                letter-spacing:1px;
            ">
                New Admission Enquiry
            </h1>

            <p style="
                margin-top:10px;
                font-size:16px;
                opacity:.9;
            ">
                RBT Inter College Khabri Dhanaura
            </p>

        </div>

        <!-- BODY -->

        <div style="padding:35px;">

            <table width="100%" cellpadding="12" cellspacing="0" style="border-collapse:collapse; table-layout:fixed; width:100%;">

                <tr style="background:#f8f9fc;">
                    <td style="font-weight:700;">Student Name</td>
                    <td>' . $student_name . '</td>
                </tr>

                <tr>
                    <td style="font-weight:700;">Parent Name</td>
                    <td>' . $parent_name . '</td>
                </tr>

                <tr style="background:#f8f9fc;">
                    <td style="font-weight:700;">Class</td>
                    <td>' . $class_applying . '</td>
                </tr>

                <tr>
                    <td style="font-weight:700;">Mobile</td>
                    <td>' . $mobile . '</td>
                </tr>

                <tr style="background:#f8f9fc;">
                    <td style="font-weight:700;">Email</td>
                    <td>' . $email . '</td>
                </tr>

                <tr>
                    <td style="font-weight:700;">Address</td>
                    <td>' . $address . '</td>
                </tr>

                <tr style="background:#f8f9fc;">
                    <td style="font-weight:700;">Message</td>
                    <td>' . $message . '</td>
                </tr>

            </table>

            <!-- BUTTON -->

            <div style="text-align:center;margin-top:35px;">

                <a href="tel:' . $mobile . '" style="
                    background:#f4b400;
                    color:#000;
                    padding:14px 35px;
                    text-decoration:none;
                    border-radius:8px;
                    font-weight:700;
                    display:inline-block;
                    font-size:16px;
                ">
                    📞 Call Student
                </a>

            </div>

        </div>

        <!-- FOOTER -->

        <div style="
            background:#021b46;
            color:#ffffff;
            text-align:center;
            padding:20px;
            font-size:14px;
        ">

            © 2026 RBT Inter College Khabri Dhanaura <br>
            Admission Department

        </div>

    </div>

</div>

';

        $mail->send();

        session_start();

        $_SESSION['success'] = "Enquiry Submitted Successfully";

        header("Location: admission.php");

exit();

    }catch(Exception $e){

        echo "Mailer Error: " . $mail->ErrorInfo;

    }

}
?>