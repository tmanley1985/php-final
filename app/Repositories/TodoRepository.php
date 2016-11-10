<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
	protected $todo;

	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}


	public function getId()
	{
		return $this->todo->getId();
	}

	public function errors()
	{
		return $this->todo->errors();
	}

	public function validate($title)
	{
		return $this->todo->validate($title);

	}
	
	public static function find($id)
	{
		return Todo::find($id);

	}

	public static function findAll()
	{
		return Todo::findAll();

	}

	public function save($title)
	{
		return $this->todo->save($title);


	}

	public function destroy($id)
	{
		return $this->todo->destroy($id);
		
	}

	public function update($id, $title)
	{

		return $this->todo->update($id, $title);
 		

	}
}