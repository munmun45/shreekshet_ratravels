<?php
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'Unknown error',
];

try {
    // DB connection
    require_once __DIR__ . '/../config/config.php';
    if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
        // Fallback connection to ensure endpoint works even if config is empty
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
    $createSql = "CREATE TABLE IF NOT EXISTS activity_bookings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        activity_id INT NOT NULL,
        activity_title VARCHAR(255) NOT NULL,
        travel_date DATE NOT NULL,
        adults INT NOT NULL DEFAULT 1,
        children INT NOT NULL DEFAULT 0,
        mobile VARCHAR(20) NOT NULL,
        email VARCHAR(255) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    if (!$conn->query($createSql)) {
        throw new Exception('Failed to ensure bookings table: ' . $conn->error);
    }

    // Inputs
    $activity_id    = isset($_POST['activity_id']) ? (int)$_POST['activity_id'] : 0;
    $activity_title = isset($_POST['activity_title']) ? trim($_POST['activity_title']) : '';
    $date           = isset($_POST['date']) ? trim($_POST['date']) : '';
    $adults         = isset($_POST['adults']) ? (int)$_POST['adults'] : 0;
    $children       = isset($_POST['children']) ? (int)$_POST['children'] : 0;
    $mobile         = isset($_POST['mobile']) ? preg_replace('/\D+/', '', $_POST['mobile']) : '';
    $email          = isset($_POST['email']) ? trim($_POST['email']) : null;

    // Basic validation
    if ($activity_id <= 0) throw new Exception('Invalid activity');
    if ($date === '') throw new Exception('Please select a date');
    if ($adults < 1) throw new Exception('At least 1 adult is required');
    if (strlen($mobile) < 10) throw new Exception('Please enter a valid 10-digit mobile number');
    if ($email !== null && $email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email address');
    }

    // Insert booking
    $ins = $conn->prepare("INSERT INTO activity_bookings (activity_id, activity_title, travel_date, adults, children, mobile, email) VALUES (?,?,?,?,?,?,?)");
    if (!$ins) throw new Exception('Prepare failed: ' . $conn->error);
    $ins->bind_param('issiiis', $activity_id, $activity_title, $date, $adults, $children, $mobile, $email);
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
        // Use PHPMailer from email/vendor if available
        $autoloadPath = __DIR__ . '/../email/vendor/autoload.php';
        if (file_exists($autoloadPath)) {
            require_once $autoloadPath;
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            // Configure as needed; by default uses PHP mail(). Adjust to SMTP if available.
            // $mail->isSMTP();
            // $mail->Host = 'smtp.example.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'user';
            // $mail->Password = 'pass';
            // $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->Port = 587;

            $adminTo = 'admin@localhost'; // TODO: set your desired admin email
            $mail->setFrom('no-reply@localhost', 'Activity Booking');
            $mail->addAddress($adminTo);
            if ($email) {
                // optional: send copy to customer
                $mail->addReplyTo($email);
            }
            $mail->isHTML(true);
            $mail->Subject = 'New Activity Booking #' . $booking_id;

            $html = '<h2>New Activity Booking</h2>' .
                '<p><strong>Activity:</strong> ' . htmlspecialchars($activity_title) . ' (ID: ' . (int)$activity_id . ')</p>' .
                '<p><strong>Date:</strong> ' . htmlspecialchars($date) . '</p>' .
                '<p><strong>Adults:</strong> ' . (int)$adults . ' | <strong>Children:</strong> ' . (int)$children . '</p>' .
                '<p><strong>Mobile:</strong> ' . htmlspecialchars($mobile) . '</p>' .
                '<p><strong>Email:</strong> ' . htmlspecialchars((string)$email) . '</p>' .
                '<p><strong>Booking ID:</strong> ' . (int)$booking_id . '</p>';

            $mail->Body = $html;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $html));

            $mail->send();
            $mailSent = true;
        } else {
            $mailError = 'PHPMailer not installed';
        }
    } catch (Exception $e) {
        $mailError = $e->getMessage();
    }

    // Optional: log email/booking into a file under email/logs
    $logDir = __DIR__ . '/../email/logs';
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0777, true);
    }
    @file_put_contents(
        $logDir . '/activity_bookings.log',
        date('c') . " | #$booking_id | Activity:$activity_title | Date:$date | Adults:$adults | Children:$children | Mobile:$mobile | Email:$email | Mail:" . ($mailSent ? 'OK' : ('FAIL:' . $mailError)) . "\n",
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
