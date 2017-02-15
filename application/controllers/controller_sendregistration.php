<?php
Class controller_sendregistration extends Controller
{
    private $pdo;
    public $view;

    function __construct()
    {
        $this->view = new View();
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=Registration", 'root', '');
        } catch (PDOException $e) {
            exit('ERROR.' . $e);
        }
    }

    function action_index()
    {

    }

    private function insert_in_database()
    {
        if (isset($_POST['user_name']) && ($_POST['user_age'])) {
            $stmt = $this->pdo->prepare("INSERT INTO Registration_Data (name, age) VALUES (:name, :age)");
            $stmt->execute(array(
                "name" => $_POST['user_name'],
                "age" => $_POST['user_age']
            ));
        } else {
            echo "Error insert in Database";
        }
    }
    

    private function check_google_captcha()
    {
        if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
            $secret = "6Lef8ggUAAAAAJa2mqZaOKqUDhShltFSQCmtFJYr";
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
            $arr = json_decode($rsp, true);
            return $arr['success'];
        } else {
            return false;
        }
    }

    public function action_send_reg(){

        $is_captcha_succeed = $this->check_google_captcha();
        if ($is_captcha_succeed) {
            $this->insert_in_database();
            $this->view->generate('sucsess_view.php', 'template_view.php');
        }else{
            $this->view->generate('again_view.php', 'template_view.php');
        }
    }
}
