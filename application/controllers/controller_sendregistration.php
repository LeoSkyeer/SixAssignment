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

    public function action_send_reg()
    {
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
                echo $name_in_db;
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
            echo "Error";
        }
        $this->view->generate('sucsess_view.php', 'template_view.php');
    }
}