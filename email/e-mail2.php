<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);







if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    
    $_name = $_GET['name'];
    $email = $_GET['email'];
    $newApplyCourse = $_GET['newApplyCourse'];

    
    $message_1 = "
        
                <p style='font-size: 20px' >
                
                    
                    <b>Dear ".$_name.", </b><br><br>
                    
                
                    This is to notify you that your admission to the ".$newApplyCourse." course has been successfully updated. <br><br>
                    
                    
                    For your Conformation,<br>
                    👇Click on the Link and check with your Registered phone number👇 <br> <br><br>
                    
                    <b>https://satyameducation.org.in/admission/</b> <br> <br><br>
                  
                         
                    

                       
                         
                        Regards,<br>
                        <b>Satyam Education(ଶିକ୍ଷ୍ୟା ସତ୍ୟମ୍)</b><br><br>
                           Satyavihar, Bhubaneswar, 751010 <br>
                        📞 9658255553 / 7978293733<br>
                        🌐 https://satyameducation.org.in/  <br>
                        📍 https://satyameducation.org.in/address <br>
                        ▶️ https://www.youtube.com/sikshyasatyam <br>

                    
                    
                </p>
            
            
            ";
            
            
            
        <p>For your confirmation,</p>

<p>👇Click on the link and check with your registered phone number👇</p>

<p>
  <b><a href="https://satyameducation.org.in/admission/" target="_blank">
    https://satyameducation.org.in/admission/
  </a></b>
</p>

<p><i>Thank you for choosing us.</i></p>

<p>
  Regards,<br>
  <b>Satyam Education (ଶିକ୍ଷ୍ୟା ସତ୍ୟମ୍)</b><br>
  Satyavihar, Bhubaneswar, 751010<br>
  📞 9658255553 / 7978293733<br>
  🌐 <a href="https://satyameducation.org.in/" target="_blank">https://satyameducation.org.in/</a><br>
  📍 <a href="https://satyameducation.org.in/address" target="_blank">https://satyameducation.org.in/address</a><br>
  ▶️ <a href="https://www.youtube.com/sikshyasatyam" target="_blank">YouTube: Sikshya Satyam</a><br>


        
        

        try {


            // $message_1 = " Name : - " . $_name . " <br> Number : - " . $number . " <br> Email : - " . $email .   "  <br> Paid Amount : - ₹" . $book_price .   " <br>  <br> " . $message;
            
            
            
            
            
            
            
            


            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->Username = 'info@satyameducation.org.in';
            $mail->Password = 'Qwertyuiop1@';

            $mail->setFrom('info@satyameducation.org.in', 'Education');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Regarding Update from your side";
            $mail->Body    = $message_1;

            $mail->send();

            // Update status in the database
         




            $status="Successful";


         
            
            
            
            
            
            echo "
                <script>
                    localStorage.setItem('alert_Email', '1');
                    window.location.href='../index.php';
                </script>
            ";
            exit;
        } catch (Exception $e) {
            // Handle exceptions here
            echo "
                <script>
                    localStorage.setItem('alert_Email', '2');
                    window.location.href='../index.php';
                </script>
            ";
            exit;
        }
}
