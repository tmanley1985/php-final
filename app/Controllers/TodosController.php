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
		$todo = $this->todo->get();

		return $this->view();
	}

	public function show($id)
	{
		$todo = Todo::find($id);

		return $this->view();

	}

	public function create()
	{
		return $this->view();
	}

	public function store()
	{


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