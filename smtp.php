<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

$hostname = '';
$port = '';
$secure = '';
$username = '';
$password = '';
$recipient = '';
$subject = '';
$bodytext = '';

if (isset($_POST['submit'])) {
    $hostname = filter_input(INPUT_POST, 'hostname', FILTER_SANITIZE_STRING);
    $port = filter_input(INPUT_POST, 'port', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $recipient = filter_input(INPUT_POST, 'recipient', FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $bodytext = filter_input(INPUT_POST, 'bodytext', FILTER_SANITIZE_STRING);
    
    $secure = filter_input(INPUT_POST, 'secure', FILTER_SANITIZE_STRING);
    if ("tls" == $secure) {
       $secure = "PHPMailer::ENCRYPTION_STARTTLS";
    }elseif("ssl" == $secure){
       $secure = "PHPMailer::ENCRYPTION_SMTPS";
    }

    



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
        $mail->SMTPSecure = "$secure"; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
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
        echo "<pre> Message could not be sent. Mailer Error: {$mail->ErrorInfo} </pre>";

    }
}