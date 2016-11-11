<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
	/** @type App\Models\Todo $todo The current Todo. */
	protected $todo;

	/**
	 * @param App\Models\Todo $todo The current Todo
	 */
	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}


	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->todo->getId();
	}

	/**
	 * @return array
	 */
	public function errors()
	{
		return $this->todo->errors();
	}

	/**
	 * @param  string $title The title of the todo.
	 * 
	 * @return boolean
	 */
	public function validate($title)
	{
		return $this->todo->validate($title);

	}
	
	/**
	 * @param  int $id Id of the Todo to find.
	 * 
	 * @return array
	 */
	public static function find($id)
	{
		return Todo::find($id);

	}

	/**
	 * @return array
	 */
	public static function findAll()
	{
		return Todo::findAll();

	}

	/**
	 * @param  string $title The title of the todo to save.
	 * 
	 * @return int
	 */
	public function save($title)
	{
		return $this->todo->save($title);


	}

	/**
	 * @param  int $id Id of the todo to destroy.
	 * 
	 * @return boolean
	 */
	public function destroy($id)
	{
		return $this->todo->destroy($id);
		
	}

	/**
	 * @param  int $id Id of the todo to update.
	 * @param  string $title The title of the todo to update.
	 * 
	 * @return boolean
	 */
	public function update($id, $title)
	{

		return $this->todo->update($id, $title);
 		

	}
}