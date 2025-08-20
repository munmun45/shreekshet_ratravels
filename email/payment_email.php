<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendPaymentEmail($to, $studentName, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->SMTPAuth = true;
        $mail->Username = 'info@satyameducation.org.in';
        $mail->Password = 'Qwertyuiop1@';

        //Recipients
        $mail->setFrom('info@satyameducation.org.in', 'Satyam Education');
        $mail->addAddress($to, $studentName);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error instead of echoing
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

