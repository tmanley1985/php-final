<?php namespace App\Controllers;

class Controller {
	/**
	 * Requires the view file
	 * @param  string $view Filename
	 * @return void
	 */
	public function view( $view, $data = [] )
	{
		require_once '../app/Views/' . $view . '.php';
	}
}
