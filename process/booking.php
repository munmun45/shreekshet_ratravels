<?php
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'Unknown error',
];

try {
    // DB connection
    require_once __DIR__ . '/../config/config.php';
    if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
        // Fallback connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "shreekshetra_travels";
        $conn = @new mysqli($servername, $username, $password, $dbname);
        if ($conn && !$conn->connect_error) { @mysqli_set_charset($conn, 'utf8mb4'); }
    }
    if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
        throw new Exception('Database connection not available');
    }

    // Ensure table exists
    $createSql = "CREATE TABLE IF NOT EXISTS hotel_bookings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        destination VARCHAR(255) NOT NULL,
        checkin DATE NOT NULL,
        checkout DATE NOT NULL,
        adults INT NOT NULL DEFAULT 1,
        children INT NOT NULL DEFAULT 0,
        mobile VARCHAR(20) NOT NULL,
        email VARCHAR(255) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    if (!$conn->query($createSql)) {
        throw new Exception('Failed to ensure hotel_bookings table: ' . $conn->error);
    }

    // Inputs
    $destination = isset($_POST['destination']) ? trim($_POST['destination']) : '';
    $checkin     = isset($_POST['checkin']) ? trim($_POST['checkin']) : '';
    $checkout    = isset($_POST['checkout']) ? trim($_POST['checkout']) : '';
    $adults      = isset($_POST['adults']) ? (int)$_POST['adults'] : 0;
    $children    = isset($_POST['children']) ? (int)$_POST['children'] : 0;
    $mobile      = isset($_POST['mobile']) ? preg_replace('/\D+/', '', $_POST['mobile']) : '';
    $email       = isset($_POST['email']) ? trim($_POST['email']) : null;

    // Validation
    if ($destination === '') throw new Exception('Please enter destination');
    if ($checkin === '' || $checkout === '') throw new Exception('Please select check-in and check-out');
    if ($adults < 1) throw new Exception('At least 1 adult is required');
    if (strlen($mobile) < 10) throw new Exception('Please enter a valid 10-digit mobile number');
    if ($email !== null && $email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email address');
    }
    if (strtotime($checkout) < strtotime($checkin)) {
        throw new Exception('Check-out date cannot be before check-in');
    }

    // Insert booking
    $ins = $conn->prepare("INSERT INTO hotel_bookings (destination, checkin, checkout, adults, children, mobile, email) VALUES (?,?,?,?,?,?,?)");
    if (!$ins) throw new Exception('Prepare failed: ' . $conn->error);
    $ins->bind_param('sssiiis', $destination, $checkin, $checkout, $adults, $children, $mobile, $email);
    if (!$ins->execute()) {
        $ins->close();
        throw new Exception('Insert failed: ' . $conn->error);
    }
    $booking_id = $ins->insert_id;
    $ins->close();

    // Prepare email
    $mailSent = false;
    $mailError = '';

    try {
        require_once __DIR__ . '/../email/email.php';
        
        $html = '<h2>New Hotel Booking</h2>' .
            '<p><strong>Destination:</strong> ' . htmlspecialchars($destination) . '</p>' .
            '<p><strong>Check-in:</strong> ' . htmlspecialchars($checkin) . ' | <strong>Check-out:</strong> ' . htmlspecialchars($checkout) . '</p>' .
            '<p><strong>Adults:</strong> ' . (int)$adults . ' | <strong>Children:</strong> ' . (int)$children . '</p>' .
            '<p><strong>Mobile:</strong> ' . htmlspecialchars($mobile) . '</p>' .
            '<p><strong>Email:</strong> ' . htmlspecialchars((string)$email) . '</p>' .
            '<p><strong>Booking ID:</strong> ' . (int)$booking_id . '</p>';

        $mailSent = sendPaymentEmail($destination, $html);
        if (!$mailSent) {
            $mailError = 'Failed to send email';
        }
    } catch (Exception $e) {
        $mailError = $e->getMessage();
    }

    // Log
    $logDir = __DIR__ . '/../email_api/logs';
    if (!is_dir($logDir)) { @mkdir($logDir, 0777, true); }
    @file_put_contents(
        $logDir . '/activity_bookings.log',
        date('Y-m-d H:i:s T') . " | #$booking_id | Hotel:$destination | Checkin:$checkin | Checkout:$checkout | Adults:$adults | Children:$children | Mobile:$mobile | Email:$email | Mail:" . ($mailSent ? 'OK' : ('FAIL:' . $mailError)) . "\n",
        FILE_APPEND
    );

    $response['success'] = true;
    $response['message'] = $mailSent ? 'Booking saved and email sent!' : 'Booking saved. Email could not be sent.';
    $response['booking_id'] = $booking_id;
} catch (Exception $ex) {
    $response['success'] = false;
    $response['message'] = $ex->getMessage();
}

echo json_encode($response);
