<?php 

namespace App\Models;

use App\Database\DB;

class Model 
{

	protected $connection;
	public static $errors = [];

	public function __construct()
	{
		try {

			$connection = new \PDO('mysql:host=127.0.0.1;dbname=homestead', 'homestead', 'secret');

		}catch(PDOException $e) {
			die('Could not connect');
		}

		$this->connection = $connection;
	}

	public function errors()
	{
		return static::$errors;
	}

	public function validate($title)
	{

		if($title == null) {

			static::$errors['title'] = 'Title cannot be null';
			return false;
		}

		return true;

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

	public function save($title)
	{
		$validation = $this->validate($title);

		if($validation == false) {

			return false;
		}

		$db_name = $this->getDatabaseName(static::class);

		$statement = $this->connection->prepare("insert into {$db_name}(title) values('{$title}')");

		$statement->execute();

		return true;


	}

	public function destroy($id)
	{
		$db_name = $this->getDatabaseName(static::class);

		$sql = "DELETE FROM {$db_name}
				WHERE id=:id";
		$statement = $this->connection->prepare($sql);
		$statement->bindValue(":id",$id);
		$statement->execute();
		
	}

	public function update($id, $title)
	{

		$validation = $this->validate($title);

		if($validation == false) {

			return false;
		}

		$db_name = $this->getDatabaseName(static::class);

		$sql = "UPDATE `{$db_name}` SET `title` = :title WHERE id = :id";

		$statement = $this->connection->prepare($sql);
 		
 		$statement->bindValue(":title", $title);
 		$statement->bindValue(":id", $id);
 		$statement->execute();
 		

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