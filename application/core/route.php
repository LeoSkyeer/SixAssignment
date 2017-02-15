<?php

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'tellbook';
		$action_name = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
			}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;


//		echo 'подцепляем файл с классом модели (файла модели может и не быть)<br>';
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

//		echo 'подцепляем файл с классом контроллера<br>';
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{

			$controller_name = 'Controller_404';
			$str= strtolower($controller_name);
			include "application/controllers/".$str.'.php';

		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;



		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
		echo 'method not found';
		}
	}

}
