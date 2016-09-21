<?php

class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
//		print_r($routes);

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
//		echo $model_name.'<br>';
		$controller_name = 'Controller_'.$controller_name;
//		echo $controller_name.'<br>';
		$action_name = 'action_'.$action_name;
//		echo $action_name.'<br><br>';


//		echo 'подцепляем файл с классом модели (файла модели может и не быть)<br>';

		$model_file = strtolower($model_name).'.php';
//		echo $model_file.'<br>';
		$model_path = "application/models/".$model_file;
//		echo $model_path.'<br><br>';
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

//		echo 'подцепляем файл с классом контроллера<br>';
		$controller_file = strtolower($controller_name).'.php';
//		echo $controller_file.'<br>';
		$controller_path = "application/controllers/".$controller_file;
//		echo $controller_path.'<br><br>';
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
