<?php 

namespace App\Models;

use App\Database\DAO;
use App\Database\DAOInterface as Connection;

class Model 
{
	/** @type App\Database\DAOInterface $connection Database connection. */
	protected $connection;

	/** @type int $id Id of the current instance. */
	protected $id;
	
	/** @type array $errors Array of errors. */
	public static $errors = [];

	/**
	 * @param App\Database\DAOInterface $connection Database connection.
	 *
	 * @return  void
	 */
	public function __construct(Connection $connection)
	{

		$this->connection = $connection;
	}

	/**
	 * @return int|null
	 */
	public function getId()
	{
		return $this->id ? $this->id : null;
	}

	/**
	 * @return array 
	 */
	public function errors()
	{
		return static::$errors;
	}

	/**
	 * @param  string $title Title of the current todo.
	 * 
	 * @return boolean
	 */
	public function validate($title)
	{
		static::$errors = [];

		if ($title == null) {

			static::$errors['title'] = 'Title cannot be null';
			return false;
		}

		return true;

	}
	
	/**
	 * @param  int $int Id of the item to find.
	 * 
	 * @return array
	 */
	public static function find($id)
	{
		
		$static = new static(new DAO('todos'));

		return $static->connection->get($id);

	}

	/**
	 * @return array
	 */
	public static function findAll()
	{
		$static = new static(new DAO('todos'));

		return $static->connection->getAll();

	}

	/**
	 * @param  string $title Title of the todo.
	 * 
	 * @return boolean
	 */
	public function save($title)
	{
		/** @type boolean $validation Whether or not the model was validated. */
		$validation = $this->validate($title);

		if ($validation == false) {

			return false;
		}

		/** @type int $this->id Id of the saved model. */
		$this->id = $this->connection->save($title);

		return true;

	}

	/**
	 * @param  int $id Id of the model to destroy.
	 * 
	 * @return boolean
	 */
	public function destroy($id)
	{
		$table_name = $this->getDatabaseName(static::class);

		return $this->connection->delete($id);
		
	}

	/**
	 * @param  int $id Id of the model to update.
	 * @param  string $title The title of the model to update.
	 * 
	 * @return boolean
	 */
	public function update($id, $title)
	{

		$validation = $this->validate($title);

		if ($validation == false) {

			return false;
		}

		return $this->connection->update($id, $title);
 		

	}

	/**
	 * @param  int $id Id of the model to destroy.
	 * 
	 * @return array
	 */
	protected function get($id)
	{
		return $this->connection->get($id);	
	}

	/**
	 * @return array
	 */
	protected function getAll() 
	{

		return $this->connection->getAll();
	}

	/**
	 * @param  string $class Namespace of the class.
	 * 
	 * @return string
	 */
	protected function getDatabaseName($class) 
	{
		// Split the path by backslashes, grab the last element, cast it to a string and add an s.
		return strtolower(implode('', array_slice( explode( '\\', $class ), -1 ) ) )  . 's';

	}
}