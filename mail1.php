<?php
if (isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']) {
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";

    $secret = "6LfxTQcUAAAAAGgquzeyssmhaTsWEOLhGSG_GmK1";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
//    var_dump($rsp);
    $arr = json_decode($rsp, true);

    if ($arr['success']) {
        require 'vendor/autoload.php';
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'oblachnyy.leopold@mail.ru';                 // SMTP username
        $mail->Password = '478951236aA';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->CharSet = 'UTF-8';
        $mail->setFrom('oblachnyy.leopold@mail.ru', 'Leo');

        $mail->addCC($_POST['user_email']);
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Поздравляю ' . $_POST['user_name'] . ' с успешной регистрацией!';
        $mail->Body = 'Твое имя: ' . ($_POST['user_name']) . '<br>' . 'Твой возраст: ' . ($_POST['user_age']) . '<br>' . 'Твоё сообщение: ' . ($_POST['user_message']) . '<br>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo "SPAM";
        } else {
            echo 'Message has been sent';
        }
    }
} else{
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "asdasd";
}




//    oblachnyy.leopold@mail.ru
//    478951236aA

//    mister.tvistertest@yandex.ru
//    Ob5p7dqk123

// Если емайл "подтвержденный" или "старый" то сообщения приходят во "входящие" если емайл нвоый, то в спам. =(

