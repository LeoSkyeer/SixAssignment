<?php
Class controller_sendregistration extends Controller{
    private $pdo;
    public $view;

    function __construct()
    {
        $this->view = new View();
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=Registration", 'root', '');
        } catch (PDOException $e) {
            exit('ERROR.'.$e);
        }
    }

    function action_index()
    {

    }

    private function insert_in_database(){
        if (isset($_POST['user_name']) && ($_POST['user_age']) && ($_POST['user_message'])) {
            $stmt = $this->pdo->prepare("INSERT INTO Registration_Data (name, age, text) VALUES (:name, :age, :message)");
            $stmt->execute(array(
                "name" => $_POST['user_name'],
                "age" => $_POST['user_age'],
                "message" => $_POST['user_message']
            ));

            $path = 'photos/';
            $ext = array_pop(explode('.', $_FILES['fileToUpload']['image'])); // расширение
            $new_name = time() . '.' . $ext;
            $full_path = $path . $new_name;
            $name_in_db = substr($new_name, 0, -1);
//                echo $name_in_db;
            if ($_FILES['fileToUpload']['error'] == 0) {
                if (substr($_FILES["fileToUpload"]["name"], -3) == "jpg" || substr($_FILES["file"]["name"], -3) == "png") {
                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path)) {
                        echo "Регистрация прошла успешно";
                    }
                }
            }

            $stmt2 = $this->pdo->prepare("INSERT INTO Image_Data (user_id, image) VALUES ((SELECT id FROM Registration_Data WHERE NAME = :user_name), '".$name_in_db."')");
            $stmt2->bindParam(':user_name', $_POST['user_name']);
            $stmt2->execute();

            $controller_name = 'application/controllers/controller_sendregistration.php';
            $str = strtolower($controller_name);
            new Controller_sendregistration($this->action_index());

        } else {
            echo "Error insert in Database";
        }
    }

    private function check_google_captcha()
    {
        if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
            $secret = "6LfxTQcUAAAAAGgquzeyssmhaTsWEOLhGSG_GmK1";
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
            $arr = json_decode($rsp, true);
            return $arr['success'];
        } else {
            return false;
        }
    }

    private function send_email(){
            require 'vendor/autoload.php';
            $mail = new PHPMailer;

            $mail->isSMTP();            // Set mailer to use SMTP
            $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;     // Enable SMTP authentication
            $mail->Username = 'oblachnyy.leopold@mail.ru';              // SMTP username
            $mail->Password = '478951236aA';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            $mail->CharSet = 'UTF-8';
            $mail->setFrom('oblachnyy.leopold@mail.ru', 'Leo');

            $mail->addCC($_POST['user_email']);
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Поздравляю ' . $_POST['user_name'] . ' с успешной регистрацией!';

            $mail->Body = 'Твое имя: ' . ($_POST['user_name'])
                . '<br>' . 'Твой возраст: ' . ($_POST['user_age']) . '<br>'
                . 'Твоё сообщение: ' . ($_POST['user_message']) . '<br>';

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                echo "SPAM";
            } else {
                echo 'Message has been sent';
            }
}

    public function action_send_reg(){

        $is_captcha_succeed = $this->check_google_captcha();

        if ($is_captcha_succeed) {
            $this->insert_in_database();
            $this->send_email();
            $this->view->generate('sucsess_view.php', 'template_view.php');
        }else{
            $this->view->generate('again_view.php', 'template_view.php');
        }
    }
}