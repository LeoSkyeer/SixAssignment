<?php
class Controller_list extends Controller
{

	function __construct()
	{
		$this->model = new Model_list();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('list_view.php', 'template_view.php', $data);
	}
}
