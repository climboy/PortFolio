<?php
require 'phpmailer/phpmailer/PHPMailerAutoload.php';
function bite() {
$mail = new PHPMailer;



$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'thomas.clavier80@gmail.com';                 // SMTP username
$mail->Password = 'jesuisthomas';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail ->SMTPDebug = 3;


$mail->setFrom('thomas.clavier80@gmail.com', 'Mailer');
$mail->addAddress('thomas.clavier70@yahoo.fr', 'Joe User');     // Add a recipient
$mail->addReplyTo('thomas.80@gmail.com', 'Information');
/*$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');*/

/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'message';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}

 ?>
