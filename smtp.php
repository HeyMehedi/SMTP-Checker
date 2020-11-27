<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

$hostname = '';
$port = '';
$username = '';
$password = '';

$recipient = '';
$subject = '';
$bodytext = '';

if (isset($_POST['submit'])) {

    $hostname = $_POST['hostname'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $bodytext = $_POST['bodytext'];


    // Instantiation and passing `true` enables exceptions

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = "$hostname"; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = "$username"; // SMTP username
        $mail->Password = "$password"; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = "$port"; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom("$username", 'HeyMehedi');
        $mail->addAddress("$recipient"); // Name is optional
        $mail->addReplyTo("$username", 'No Reply');

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "$subject";
        $mail->Body = "$bodytext";
        $mail->AltBody = "$bodytext";

        $mail->send();
        header('location: /?status=success');
    } catch (Exception $e) {
        echo "<pre>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</pre>";

    }
}