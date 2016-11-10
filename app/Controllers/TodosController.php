<?php 

namespace App\Controllers;

use App\Repositories\TodoRepository;
use App\Controllers\Controller;
use App\Models\Todo;

class TodosController extends Controller 
{

	public $todo;

	public function __construct(TodoRepository $todo)
	{
		$this->todo = $todo;

	}

	public function index()
	{

		$todos = TodoRepository::findAll();

		return $this->view('home', $todos);
	}

	public function show($id)
	{
		$todo = TodoRepository::find($id);

		// $todo = ['id' => $id, 'title' => 'Make Sandwich'];

		return $this->view('show', $todo);

	}

	public function create()
	{
		return $this->view('create');
	}

	public function store()
	{
		extract($_POST);

		// Validate using the todo model.

		// if errors are set, return view with errors.

		// Store the todo.

		$todo = new TodoRepository(new Todo());

		$todo_added = $todo->save($title);

		if ($todo_added == false) {

			$errors = $todo->errors();

			return $this->view('create', ['errors' => $errors]);
		}

		return $this->view('home');

	}

	public function edit($id)
	{

		$todo = TodoRepository::find($id);


		return $this->view('edit', $todo);
	}

	public function update()
	{


		extract($_POST);

		// Validate using the todo model.

		// if errors are set, return view with errors.
		


		// Update the todo.


		$todo = new TodoRepository(new Todo());

		$todo_updated = $todo->update($id, $title);

		if ($todo_updated == false) {

			$errors = $todo->errors();

			return $this->view('create', ['errors' => $errors]);
		}

		return $this->view('home');

	}

	public function destroy($id)
	{	
		$todo = new TodoRepository(new Todo());

		$todo->destroy($id);

		return $this->view('home');

	}

}