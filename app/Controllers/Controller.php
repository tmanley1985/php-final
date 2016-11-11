<?php 

namespace App\Controllers;

class Controller 
{
	/**
	* Requires the view file
	* 
	* @param  string $view Filename
	* @param  array|null $data An array of data passed to the view.
	* 
	* 
	* @return void
	*/
	public function view( $view, $data = [] )
	{
		
		require_once 'app/Views/' . $view . '.php';
	}
}
