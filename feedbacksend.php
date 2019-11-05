<?php

require_once 'mysql_connection.php';
include './includes/header.php';
?> 
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_SESSION["username"])) {
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    //Load Composer's autoloader
     $sendEmailFrom = $_SESSION['username'];
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'foodbear.tempemail@gmail.com';                 // SMTP username
        $mail->Password = 'Food.bear1';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom($sendEmailFrom);
        $mail->addAddress('foodbear.tempemail@gmail.com');     // Add a recipient
        
        $msg = $_POST["msg"];
        
        $body = 'From: ' . $sendEmailFrom . '<br>Feedback & Complaint:'. $msg;

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Customer Feedback';
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';
        echo '<script type="text/javascript">';
        echo 'window.location.href = "feedbackthanks.php";';
        echo '</script>';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Please Log In to send feedback");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
}
?>
<?php

include './includes/footer.php';
?>