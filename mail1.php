<?php
if (empty($_POST)) {
    exit('No Data');
}else {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    require 'vendor/autoload.php';

    $mail = new PHPMailer;

//    oblachnyy.leopold@mail.ru
//    478951236aA

//    mister.tvistertest@yandex.ru
//    Ob5p7dqk123

// Если емайл "подтвержденный" или "старый" то сообщения приходят во "входящие" если емайл нвоый, то в спам. =(

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'oblachnyy.leopold@mail.ru';                 // SMTP username
    $mail->Password = '478951236aA';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->CharSet = 'UTF-8';
    $mail->setFrom('oblachnyy.leopold@mail.ru', 'Leo');

    $mail->addCC($_POST['email']);
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Поздравляю '.$_POST['name'].' с успешной регистрацией!';
    $mail->Body = 'Твое имя: ' . ($_POST['name']).'<br>'.'Твой возраст: '. ($_POST['age']).'<br>'.'Твоё сообщение: '.($_POST['text']).'<br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}





















//
//$v = new Valitron\Validator($_POST);
//$v->rule('required', ['name', 'age']);
////$v->rule('email', 'email');
//if($v->validate()) {
//    echo "все норм";
//} else {
//    echo '<pre>';
//    print_r($v->errors());
//    echo '</pre>';
//}
//
//    $mail = new PHPMailer;
//
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//
//    $mail->isSMTP();                                      // Set mailer to use SMTP
//    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
//    $mail->SMTPAuth = true;                               // Enable SMTP authentication
//    $mail->Username = 'mister.tvistertest@yandex.ru';                 // SMTP username
//    $mail->Password = 'Ob5p7dqk123';                           // SMTP password
//    $mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `ssl` also accepted
//    $mail->Port = 465;                                    // TCP port to connect to
//
//    $mail->setFrom('ChernovsIU@gmail.com', 'Mailer');
//    $mail->addAddress('vasya_90@list.ru', 'Joe User');     // Add a recipient
//
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//    $mail->isHTML(true);                                  // Set email format to HTML
//
//    $mail->Subject = 'Here is the subject';
//    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//    if(!$mail->send()) {
//        echo 'Message could not be sent.';
//        echo 'Mailer Error: ' . $mail->ErrorInfo;
//    } else {
//    print_r($v->errors());
//}