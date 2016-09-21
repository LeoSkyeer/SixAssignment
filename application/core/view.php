<?php

class View
{
    public $viewBag;

	function generate($content_view, $template_view, $data = null)
	{
	    $viewBag=$this->viewBag;

		include 'application/views/'.$template_view;
	}

}
