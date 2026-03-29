<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'c:/xampp/htdocs/phpmailer/phpmailer/src/Exception.php';
require 'c:/xampp/htdocs/phpmailer/phpmailer/src/PHPMailer.php';
require 'c:/xampp/htdocs/phpmailer/phpmailer/src/SMTP.php';

class Mailer
{
    public static function sendOTP($toEmail, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rjfelizardo25@gmail.com';
            $mail->Password   = 'lwuz oznc qpkm zsby';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('rjfelizardo25@gmail.com', 'ISCAG Philippines');
            $mail->addAddress($toEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your ISCAG Verification Code';
            $mail->Body    = "
                <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #eee; border-radius: 10px;'>
                    <h2 style='color: #1c6b3a;'>ISCAG Philippines</h2>
                    <p>Assalamu Alaikum,</p>
                    <p>Your verification code for creating an account is:</p>
                    <h1 style='background: #f5f5f5; padding: 10px; text-align: center; letter-spacing: 5px; color: #1c6b3a;'>$otp</h1>
                    <p>This code will expire in 10 minutes.</p>
                    <p>If you did not request this, please ignore this email.</p>
                </div>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
