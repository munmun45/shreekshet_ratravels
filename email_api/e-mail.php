<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Set mailer to use SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';  // Your Gmail address
    $mail->Password = 'YOUR_APP_PASSWORD';  // Your Gmail App Password (NOT the regular password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set the sender and recipient
    $mail->setFrom('your-email@gmail.com', 'Your Name');  // Your Gmail address and name
    $mail->addAddress('recipient-email@gmail.com', 'Recipient Name');  // Recipient's email

    // Set email format to HTML
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHP';  // Subject of the email
    $mail->Body    = 'This is a test email sent from PHP using Gmail SMTP.';  // Body content of the email

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
