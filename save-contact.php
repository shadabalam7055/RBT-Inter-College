<?php

include 'includes/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SAVE DATABASE

    $stmt = $pdo->prepare("
        INSERT INTO contact_messages
        (name,email,mobile,subject,message)
        VALUES(?,?,?,?,?)
    ");

    $stmt->execute([
        $name,
        $email,
        $mobile,
        $subject,
        $message
    ]);

    // SEND EMAIL

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'shadabalam7055@gmail.com';

        $mail->Password = 'cdrnuzpzgvfxobwn';

        $mail->SMTPSecure = 'tls';

        $mail->Port = 587;

        $mail->setFrom('shadabalam7055@gmail.com','RBT Inter College');

        $mail->addAddress('shadabalam7248@gmail.com');

        $mail->isHTML(true);

        $mail->Subject = "New Contact Message";

        $mail->Body = '

<div style="background:#f4f4f4;padding:30px 10px;font-family:Arial,sans-serif;">

    <div style="max-width:650px;background:#ffffff;margin:auto;border-radius:20px;overflow:hidden;">

        <div style="background:#001f5c;padding:40px 20px;text-align:center;">

            <h1 style="color:#ffffff;font-size:48px;margin:0;">
                Contact Message
            </h1>

            <p style="color:#ffffff;font-size:20px;margin-top:15px;">
                RBT Inter College
            </p>

        </div>

        <div style="padding:30px;">

            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">

                <tr>
                    <td style="
                        background:#f1f1f1;
                        padding:15px;
                        font-weight:bold;
                        width:35%;
                        border:1px solid #ffffff;
                    ">
                        Name
                    </td>

                    <td style="
                        background:#f9f9f9;
                        padding:15px;
                        word-break:break-word;
                    ">
                        '.$name.'
                    </td>
                </tr>

                <tr>
                    <td style="
                        background:#f1f1f1;
                        padding:15px;
                        font-weight:bold;
                        border:1px solid #ffffff;
                    ">
                        Email
                    </td>

                    <td style="
                        background:#f9f9f9;
                        padding:15px;
                        word-break:break-word;
                    ">
                        '.$email.'
                    </td>
                </tr>

                <tr>
                    <td style="
                        background:#f1f1f1;
                        padding:15px;
                        font-weight:bold;
                        border:1px solid #ffffff;
                    ">
                        Mobile
                    </td>

                    <td style="
                        background:#f9f9f9;
                        padding:15px;
                        word-break:break-word;
                    ">
                        '.$mobile.'
                    </td>
                </tr>

                <tr>
                    <td style="
                        background:#f1f1f1;
                        padding:15px;
                        font-weight:bold;
                        border:1px solid #ffffff;
                    ">
                        Subject
                    </td>

                    <td style="
                        background:#f9f9f9;
                        padding:15px;
                        word-break:break-word;
                    ">
                        '.$subject.'
                    </td>
                </tr>

                <tr>
                    <td style="
                        background:#f1f1f1;
                        padding:15px;
                        font-weight:bold;
                        border:1px solid #ffffff;
                    ">
                        Message
                    </td>

                    <td style="
                        background:#f9f9f9;
                        padding:15px;
                        word-break:break-word;
                    ">
                        '.$message.'
                    </td>
                </tr>

            </table>
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

        header("Location: contact.php");

exit();

    }catch(Exception $e){

        echo "Mailer Error: " . $mail->ErrorInfo;

    }

}
?>