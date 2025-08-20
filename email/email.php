<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendPaymentEmail($destination, $body) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->SMTPAuth = true;
        $mail->Username = 'no_reply@shreekshetratravels.com';
        $mail->Password = '5Gc9ShT?';

        //Recipients
        $mail->setFrom('no_reply@shreekshetratravels.com', 'Shreekshetra Travels');
        $mail->addAddress('maharanamunmun@gmail.com', $destination);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Booking';
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error instead of echoing
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

