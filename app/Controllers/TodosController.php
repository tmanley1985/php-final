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
		// $todos = $this->todo->get();

		$todos = [
			[	'id' => 1, 'title' => 'Make Sandwich']
		];

		return $this->view('home', $todos);
	}

	public function show($id)
	{
		// $todo = Todo::find($id);

		$todo = ['id' => $id, 'title' => 'Make Sandwich'];
		
		return $this->view('show', $todo);

	}

	public function create()
	{
		return $this->view('create');
	}

	public function store()
	{
		extract($_POST);

		return $this->view('home');

	}

	public function edit()
	{

	}

	public function update()
	{

	}

	public function destroy()
	{

	}

}