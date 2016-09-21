<?php
if (empty($_POST))
    exit('No Data');

require_once ('vendor/autoload.php');
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'age', 'email']);

$v->rule('email', 'email');
if($v->validate()) {

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp-relay.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ChernovsIU@gmail.com';                 // SMTP username
    $mail->Password = 'Ravencrazy123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('ChernovsIU@gmail.com', 'Mailer');
    $mail->addAddress('mister.tvistertest@yandex.ru', 'Joe User');     // Add a recipient

    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    print_r($v->errors());
}}