<?php 

namespace App\Models;

use App\Database\DAO;
use App\Database\DAOInterface as Connection;

class Model 
{

	protected $connection;

	protected $id;
	
	public static $errors = [];

	public function __construct(Connection $connection)
	{

		$this->connection = $connection;
	}

	public function getId()
	{
		return $this->id ? $this->id : null;
	}

	public function errors()
	{
		return static::$errors;
	}

	public function validate($title)
	{
		static::$errors = [];

		if ($title == null) {

			static::$errors['title'] = 'Title cannot be null';
			return false;
		}

		return true;

	}
	
	public static function find($id)
	{
		
		$static = new static(new DAO('todos'));

		return $static->connection->get($id);

	}

	public static function findAll()
	{
		$static = new static(new DAO('todos'));

		return $static->connection->getAll();

	}

	public function save($title)
	{
		$validation = $this->validate($title);

		if ($validation == false) {

			return false;
		}

		$this->id = $this->connection->save($title);

		return true;

	}

	public function destroy($id)
	{
		$table_name = $this->getDatabaseName(static::class);

		return $this->connection->delete($id);
		
	}

	public function update($id, $title)
	{

		$validation = $this->validate($title);

		if ($validation == false) {

			return false;
		}

		return $this->connection->update($id, $title);
 		

	}

	protected function get($id)
	{

		return $this->connection->get($id);
		

	}

	protected function getAll() 
	{

		return $this->connection->getAll();
	}

	protected function getDatabaseName($class) 
	{
		// Split the path by backslashes, grab the last element, cast it to a string and add an s.
		return strtolower(implode('', array_slice( explode( '\\', $class ), -1 ) ) )  . 's';

	}
}