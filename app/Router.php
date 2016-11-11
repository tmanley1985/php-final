<?php

namespace App;

use App\Models\Todo;
use App\Database\DAO;
use App\Controllers\TodosController;
use App\Repositories\TodoRepository;

class Router 
{

	/** @type App\Controllers\TodosController $controller The controller being requested. */
	protected static $controller;
	/** @type string $method The method of the current request. */
	protected static $method;

	/**
	 * @param  string $url The url of the current request.
	 * 
	 * @return void
	 */
	public static function direct($url)
	{
		/** @type array  $url The array of the url pieces. */
		$url = self::parseUrl($url);

		$dao = new DAO('todos');

		$todo = new Todo($dao);
		
		$repo = new TodoRepository($todo);

		/** @type App\Controllers\TodosController $controller Instance is now a static property. */
		self::$controller = new TodosController($repo);

		/** If there is no request for a controller redirect home. */
		if (count($url) < 2) {

			return call_user_func_array([self::$controller, 'view'], ['home']);
		}

		/** @type string self::$method Set the method for the controller */
		self::$method = $url[1];

		/** @type array $params Params are everything past the method */
		$params = array_filter($url, function($index){

			return $index > 1;

		}, ARRAY_FILTER_USE_KEY);

		/** Call the controller with the method and the params */
		call_user_func_array([self::$controller, self::$method], $params);

		
	}

	/**
	 * @param  string $url The current url.
	 * 
	 * @return array
	 */
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