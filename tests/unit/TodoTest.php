<?php

use PHPUnit\Framework\TestCase;
use \App\Models\Todo;

class TodoTest extends Testcase
{
	protected $todo;

	public function setUp()
	{
		$this->todo = new Todo();
	}

	/** @test */

	public function validationWillFailIfTitleIsNull()
	{
		$this->assertFalse($this->todo->validate(''));
	}

	/** @test */

	public function itHasErrorsForEachInvalidField()
	{
		$errors = $this->todo->errors();

		$this->assertArrayHasKey('title', $errors);
	}

	/** @test */

	public function errorsWillNotContainKeyForValidFields()
	{
		$this->todo->validate('Do Something');

		$errors = $this->todo->errors();


		$this->assertArrayNotHasKey('title', $errors);

	}

	/** @test */

	public function validationPassesWhenAllFieldsAreSet()
	{

		$this->assertTrue($this->todo->validate('Do something else'));

	}

}