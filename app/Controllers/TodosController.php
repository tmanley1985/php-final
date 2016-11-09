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
			[	'title' => 'Make Sandwich']
		];

		return $this->view('home', $todos);
	}

	public function show($id)
	{
		$todo = Todo::find($id);

		return $this->view();

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