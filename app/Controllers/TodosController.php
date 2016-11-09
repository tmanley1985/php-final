<?php namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Todo;

class TodosController extends Controller {

	public $todo;

	public function __construct(Todo $todo)
	{
		$this->todo = $todo;

	}

	public function index()
	{
		

		$todos = Todo::findAll();


		return $this->view('home', $todos);
	}

	public function show($id)
	{
		$todo = Todo::find($id);

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

		$todo = new Todo();

		$todo_added = $todo->save($title);

		return $this->view('home');

	}

	public function edit($id)
	{

		$todo = Todo::find($id);


		return $this->view('edit', $todo);
	}

	public function update()
	{


		extract($_POST);

		// Validate using the todo model.

		// if errors are set, return view with errors.
		


		// Update the todo.


		$todo = new Todo();

		$todo->update($id, $title);

		return $this->view('home');

	}

	public function destroy($id)
	{	
		$todo = new Todo();

		$todo->destroy($id);

		return $this->view('home');

	}

}