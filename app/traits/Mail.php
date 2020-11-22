<?php

namespace App\Traits;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

trait Mail {

public function mailSend($title, $body, $recipient, $name)
{
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = false;                   // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = $_ENV['MAIL_HOST'];                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = $_ENV['MAIL_USERNAME'];                     // SMTP username
$mail->Password   = $_ENV['MAIL_PASSWORD'];                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = $_ENV['MAIL_PORT'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom($_ENV['MAIL_USERNAME'], $title);
$mail->addAddress($recipient, $name);     // Add a recipient
$mail->addAddress('LSFramework@gmail.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $title;
$mail->Body    = $body;
$mail->AltBody = strip_tags($body);

$mail->send();
    return true;
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}