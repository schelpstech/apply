<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'query.php';
function sendEmail($to, $subject, $htmlContent, $altContent = "")
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
          $mail->isSMTP();
        $mail->Host       = 'mail.schelps.com.ng'; // e.g., smtp.gmail.com
        $mail->SMTPAuth   = true;
        $mail->Username   = 'atibaodl@schelps.com.ng'; 
        $mail->Password   = 'MaskedPan@890'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('atibaodl@schelps.com.ng', 'Atiba University ODL');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $altContent ?: strip_tags($htmlContent);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
