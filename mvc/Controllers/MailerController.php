<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer {
    public function sendMail($title, $content, $addressMail) {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình server
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hieuptpd09653@fpt.edu.vn';
            $mail->Password = 'omiz dbmm pheq qfdc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Người nhận
            $mail->setFrom('hieuptpd09653@fpt.edu.vn', 'HieuNe');
            $mail->addAddress($addressMail);

            // Nội dung
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $content;

            $mail->send();
            return true; // Trả về true nếu gửi thành công
        } catch (Exception $e) {
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
}
?>
