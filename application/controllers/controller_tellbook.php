<?php
Class controller_tellbook extends Controller

{
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
            $this->view->viewBag = $rows;
        }
        $this->view->generate('main_view.php', 'template_view.php');
    }

}
