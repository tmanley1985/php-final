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
		$static = new static();

		return $static->get($id);

	}

	public static function findAll()
	{
		$static = new static();

		return $static->getAll();

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

	protected function get($id)
	{
		$db_name = $this->getDatabaseName(static::class);

		$statement = $this->connection->prepare("select * from {$db_name} where id = {$id}");

		$statement->execute();

		return $statement->fetch();
		

	}

	protected function getAll() 
	{
		$db_name = $this->getDatabaseName(static::class);

		$statement = $this->connection->prepare("select * from {$db_name}");

		$statement->execute();

		return $statement->fetchAll();
	}

	protected function getDatabaseName($class) 
	{
		// Split the path by backslashes, grab the last element, cast it to a string and add an s.
		return strtolower(implode('', array_slice( explode( '\\', $class ), -1 ) ) )  . 's';

	}
}