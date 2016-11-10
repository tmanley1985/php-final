<?php

namespace App\Database;

use App\Database\DAOInterface;

class DAO implements DAOInterface
{
	protected $connection;
	protected $table;

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

	public function get($id)
	{

		$statement = $this->connection->prepare("select * from {$this->table} where id = {$id}");

		$statement->execute();

		return $statement->fetch();

	}

	public function getAll()
	{
		$statement = $this->connection->prepare("select * from {$this->table}");

		$statement->execute();

		return $statement->fetchAll();
	}

	public function save($title)
	{

		$statement = $this->connection->prepare("insert into {$this->table}(title) values('{$title}')");

		$statement->execute();

		return $this->connection->lastInsertId();

	}

	public function delete($id)
	{
		$sql = "DELETE FROM {$this->table}
				WHERE id=:id";
		$statement = $this->connection->prepare($sql);
		$statement->bindValue(":id",$id);
		$statement->execute();

		return true;
	}

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