<?php namespace App\Models;

use App\Database\DB;

class Model {

	protected $connection;

	public function __construct(DB $connection)
	{
		$this->connection = $connection;
	}

	public function validate()
	{

	}
	
	public static function find($id)
	{


	}

	public static function findAll($condition)
	{


	}

	public function save()
	{

	}

	public function destroy()
	{

	}

	public function update()
	{

	}

	public function get()
	{

	}
}