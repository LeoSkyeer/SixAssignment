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

        $rows = Array();
        $sql = 'SELECT Registration_Data.name, Registration_Data.age FROM Registration_Data ORDER BY age';

        foreach ($this->pdo->query($sql) as $row){
            array_push($rows, $row);
            print_r($row);

    }

    function action_error(){
        $this->view->generate('Error_view.php', 'template_view.php');
    }

//    public function action_send()
//    {
//        if (isset($_POST['userLogin'])) {
//            $rows = Array();
//            $sql = 'SELECT Registration_Data.name, Registration_Data.age FROM Registration_Data ORDER BY age';
//
//            foreach ($this->pdo->query($sql) as $row){
//                array_push($rows, $row);
//                print_r($row);
//            }
//            $isNameFound = false;
//            foreach ($rows as $row) {
//                if ($_POST['userLogin'] == $row['name']) {
//                    $isNameFound = true;
//                    break;
//                }
//            }
//
//
//            if ($isNameFound){
//                $this->view->viewBag = $rows;
//            }else{
//                $controller_name = 'Controller_Error';
//                $str = strtolower($controller_name);
//                include "application/controllers/" . $str . '.php';
//                new Controller_Error($this->action_error());
//            }

            $this->view->generate('getlist_view.php', 'template_view.php');
    }
}


