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
                    
                <b>Congratulations!</b> <br>
We are pleased to inform you that your admission to the <b>".$newApplyCourse."</b> course has been <b>successfully accepted.</b><br>



                    Congratulation! We are pleased to inform you that Your admission in Course ".$newApplyCourse." has been successfully accepted. <br><br>
                    However, the status is currently <b>pending</b>. It will be <b>approved after a few days.</b> </br>

📌 If it is not approved within the expected time, kindly contact your <b>Institute Coordinator</b> for assistance. <br>
                    
                    
                       
                    
                    
                   <b> For your Conformation,</b><br>
                   
                   ✅ How to Check Your Admission Status <br>

🔹 Visit the official admission portal: https://satyameducation.org.in/admission <br>

🔹 Click on “Check Admission Status”<br>

🔹 Enter your registered mobile number<br>

🔹An OTP will be sent to your email – enter it to verify<br>

After verification, your complete admission details will be displayed<br><br><br><br>
                    
                  
                         
                    

                        <i>Thank you for being a part of our institution.</i><br><br><br><br>
                         
                     
                     
                        

                    
                    
                </p>
            
            
            ";
            
        
        
        

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
            $mail->Subject = "Regarding Your Admission".$newApplyCourse."";
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
