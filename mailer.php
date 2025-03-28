<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions


if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'mail.ashiqulemu.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'info@ashiqulemu.com';                     //SMTP username
        $mail->Password = 'xhq8nc3mcj';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients

        $mail->setFrom('sender@sendar.com', 'Sender'); // from user, 
        $mail->addAddress('ashiqulemu.jpi@gmail.com', 'Emu');  // set which -> (email) will be sent the email 

        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        /* $mail->addAttachment('./resource/2.png'); */  //resource from admin   

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email-subject';

        // get form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];


        $mail->Body = "<html>
                    <body>
                        <table style='background:lightgrey; padding:15px;'>                              
                            <tr>
                                <td>Full Name : </td> 
                                 <td>$fname $lname </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><b>$email</b></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><b>$phone</b></td>
                            </tr>
                            <tr>
                                <td>Message:</td>
                                <td><b>$message</b></td>
                            </tr>
                        </table>
                    </body>
                </html>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent'; 
        header('location:thankyou.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>