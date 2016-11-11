<?php

namespace App\Database;

use App\Database\DAOInterface;

class DAO implements DAOInterface
{

	
	/**
	 * @type \PDO $connection Database connection.
	 * @type string $table Table name.
	 * 
	 */
	protected $connection;
	protected $table;

	/**
	 * @param string $table Name of the table.
	 *
	 * @return  void
	 */
	public function __construct($table)
	{
		try {

			$connection = new \PDO('mysql:host=127.0.0.1;dbname=homestead', 'homestead', 'secret');

		} catch (PDOException $e) {

			die('Could not connect');
		}

		$this->connection = $connection;
		$this->table = $table;
	}

	/**
	 * @param  int $id Id of the Todo.
	 * 
	 * @return array Array of Todos.
	 */
	public function get($id)
	{

		$statement = $this->connection->prepare("select * from {$this->table} where id = {$id}");

		$statement->execute();

		return $statement->fetch();

	}

	/**
	 * @return array An array of all Todos.
	 */
	public function getAll()
	{
		$statement = $this->connection->prepare("select * from {$this->table}");

		$statement->execute();

		return $statement->fetchAll();
	}

	/**
	 * @param  string $title The title of the Todo to be persisted.
	 * 
	 * @return int The id of the last inserted Todo.
	 */
	public function save($title)
	{

		$statement = $this->connection->prepare("insert into {$this->table}(title) values('{$title}')");

		$statement->execute();

		return $this->connection->lastInsertId();

	}

	/**
	 * @param  int $id Id of the Todo to delete.
	 * 
	 * @return boolean
	 */
	public function delete($id)
	{

		$sql = "DELETE FROM {$this->table}
				WHERE id=:id";

		$statement = $this->connection->prepare($sql);

		$statement->bindValue(":id",$id);

		$statement->execute();

		return true;
	}


	/**
	 * @param  int $id Id of the Todo to update.
	 * @param  string $title The title of the Todo.
	 * 
	 * @return boolean
	 */
	public function update($id, $title)
	{
		$sql = "UPDATE `{$this->table}` SET `title` = :title WHERE id = :id";

		$statement = $this->connection->prepare($sql);
 		
 		$statement->bindValue(":title", $title);

 		$statement->bindValue(":id", $id);

 		$statement->execute();

 		return true;
	}
}