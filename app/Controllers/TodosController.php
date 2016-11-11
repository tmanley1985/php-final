<?php 

namespace App\Controllers;

use App\Models\Todo;
use App\Database\DAO;
use App\Controllers\Controller;
use App\Repositories\TodoRepository;

class TodosController extends Controller 
{
	/** @type App\Models\Todo $todo Type of Todo. */
	public $todo;

    /**
	 * @param TodoRepository $todo
	 *
	 * @return  void
	 */
	public function __construct(TodoRepository $todo)
	{
		$this->todo = $todo;

	}

	/**
	 * @return resource The index page containing all the todos.
	 */
	public function index()
	{
		/** @type array Array of todos. */
		$todos = TodoRepository::findAll();

		return $this->view('home', $todos);
	}

	/**
	 * @param  int $id Id of the Todo.
	 * 
	 * @return resource Create todo page.
	 */
	public function show($id)
	{
		/** @type array Array containing one Todo */
		$todo = TodoRepository::find($id);


		return $this->view('show', $todo);

	}

	/**
	 * @return resource Create page.
	 */
	public function create()
	{
		return $this->view('create');
	}

	/**
	 * @return resource Create page.
	 */
	public function store()
	{
		/** Extract all the input from the POST array. */
		extract($_POST);

		/** @type App\TodoRepository */
		$todo = new TodoRepository(new Todo( new DAO('todos')));


		/** @type boolean Whether or not the Todo was persisted. */
		$todo_added = $todo->save($title);

		if ($todo_added == false) {


			/** @type array Array of errors */
			$errors = $todo->errors();

			return $this->view('create', ['errors' => $errors]);
		}

		return $this->view('home');

	}

	/**
	 * @param  int $id Id of Todo.
	 *
	 * @return resource The edit page for the todo.
	 */
	public function edit($id)
	{


		/** @type array Array containing the Todo. */
		$todo = TodoRepository::find($id);


		return $this->view('edit', $todo);
	}

	/**
	 * @return resource Home page.
	 */
	public function update()
	{


		/** Extracts all the POST input into variables. */
		extract($_POST);


		/** @type App\TodoRepository */
		$todo = new TodoRepository(new Todo( new DAO('todos')));


		/** @type boolean Whether todo was updated. */
		$todo_updated = $todo->update($id, $title);

		if ($todo_updated == false) {

			$errors = $todo->errors();

			return $this->view('create', ['errors' => $errors]);
		}

		return $this->view('home');

	}

	/**
	 * @param  int $id Id of Todo.
	 * 
	 * @return resource Home page.
	 */
	public function destroy($id)
	{	

		/** @type App\TodoRepository */
		$todo = new TodoRepository(new Todo(new DAO('todos')));

		$todo->destroy($id);

		return $this->view('home');

	}

}