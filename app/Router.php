<?php

namespace App;

use App\Models\Todo;
use App\Database\DAO;
use App\Controllers\TodosController;
use App\Repositories\TodoRepository;

class Router 
{

	protected static $controller;
	protected static $method;

	public static function direct($url)
	{
		// // Parse the url string
		$url = self::parseUrl($url);

		// Instantiate database access layer.
		$dao = new DAO('todos');

		// Inject dao into model.
		$todo = new Todo($dao);

		// Inject model into the repo.
		$repo = new TodoRepository($todo);

		// At the moment, there's only one controller and model.  Will refactor this later.
		self::$controller = new TodosController($repo);

		// If url is empty go to home page.

		if (count($url) < 2) {

			return call_user_func_array([self::$controller, 'view'], ['home']);
		}

		// Set the method
		self::$method = $url[1];

		// Get the params by filtering past the method index;
		$params = array_filter($url, function($index){
			return $index > 1;
		}, ARRAY_FILTER_USE_KEY);

		// Call the controller with the method and the params
		call_user_func_array([self::$controller, self::$method], $params);

		
	}

	protected static function parseUrl($url) 
	{

		// If url has ? then remove it along with everything after it.
		if (strpos($url,'?') !== false) {

			$url = strstr($url, '?');
		}

		$url = filter_var( trim($url, '/'), FILTER_SANITIZE_URL);


		return explode('/',$url);
	}

}