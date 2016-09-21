<?php

class Controller_404 extends Controller
{
	
	function action_index()
	{
		$this->view->generate('template_view.php', '404_view.php');
	}

}
