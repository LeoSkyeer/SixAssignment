<?php

class Controller_sendLogin extends Controller{
    private $pdo;
    public $view;
    public $viewBag;

    function __construct()
    {
        $this->view = new View();
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=Registration", 'root', '');
        } catch (PDOException $e) {
            exit('ERROR.'.$e);
        }
    }

    function action_error(){
        $this->view->generate('Error_view.php', 'template_view.php');
    }

    public function action_send()
    {
        if (isset($_POST['userLogin'])) {
            $rows = Array();
            $sql = 'SELECT Registration_Data.name, Registration_Data.age, Image_Data.image FROM Registration_Data INNER JOIN Image_Data ON Registration_Data.id=Image_Data.user_id ORDER BY age';

            foreach ($this->pdo->query($sql) as $row){
                array_push($rows, $row);
            }
            $isNameFound = false;
            foreach ($rows as $row) {
                if ($_POST['userLogin'] == $row['name']) {
                    $isNameFound = true;
                    break;
                }
            }


            if ($isNameFound){
                $this->view->viewBag = $rows;
            }else{
                $controller_name = 'Controller_Error';
                $str = strtolower($controller_name);
                include "application/controllers/" . $str . '.php';
                new Controller_Error($this->action_error());
            }

            $this->view->generate('getlist_view.php', 'template_view.php');
    }
}
}


