<?php


require_once('app/Controllers/Controller.php');
require_once('app/Models/Model.php');
require_once('app/Database/DB.php');
require_once('app/Models/Todo.php');
require_once('app/Controllers/TodosController.php');

// $connection = new App\Database\DB();

$model = new App\Models\Todo();

// $controller = new App\Controllers\TodosController(  $model );



$url = $_SERVER['REQUEST_URI'];


class Router {

	protected static $controller;
	protected static $method;

	public static function direct($url)
	{
		// // Parse the url string
		$url = self::parseUrl($url);


		self::$controller = new App\Controllers\TodosController(new App\Models\Todo());
		// Call the controller method.

		var_dump(count($url));

		// If url is empty go to home page.

		if(count($url) < 2) {

			return call_user_func_array([self::$controller, 'view'], ['home']);
		}

		// Set the method
		self::$method = $url[1];

		call_user_func_array([self::$controller, self::$method], ['home']);

		
	}

	protected static function parseUrl($url) 
	{

		// If url has ? then remove it along with everything after it.
		if(strpos($url,'?') !== false) {

			$url = rtrim($url, '?');
		}
		
		$url = filter_var( trim($url, '/'), FILTER_SANITIZE_URL);


		return explode('/',$url);
	}

}

Router::direct($url);
