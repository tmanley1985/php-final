<?php namespace App\Models;

use App\Database\DB;

class Model {

	protected $connection;

	public function __construct()
	{
		try {

			$connection = new \PDO('mysql:host=127.0.0.1;dbname=homestead', 'homestead', 'secret');

		}catch(PDOException $e) {
			die('Could not connect');
		}

		$this->connection = $connection;
	}

	public function validate()
	{

	}
	
	public static function find($id)
	{


	}

	public static function findAll($condition)
	{


	}

	public function save()
	{

	}

	public function destroy()
	{

	}

	public function update()
	{

	}

	public function get()
	{

	}
}