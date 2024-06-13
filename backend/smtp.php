<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function send_registration_email($recipient_email, $user_name) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.mailersend.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'MS_Y4jNA8@trial-0r83ql3o06xlzw1j.mlsender.net';
            $mail->Password = 'omSFoeCon2XTMHS3';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('MS_Y4jNA8@trial-0r83ql3o06xlzw1j.mlsender.net', 'Registration');
            $mail->addAddress($recipient_email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Thank you for your registration';
            $mail->Body    = "Dear $user_name,<br><br>Thank you for registering with us.<br><br>Best regards,<br>Team";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>