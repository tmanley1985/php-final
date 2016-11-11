<?php

use \App\Models\Todo;
use \App\Database\DAO;
use \Faker\Factory as Faker;
use PHPUnit\Framework\TestCase;

class TodoTest extends Testcase
{
	protected $todo;
	protected $faker;

	public function setUp()
	{
		$this->todo = new Todo( new DAO('todos') );

		$this->faker = Faker::create();

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

		$title = $this->faker->sentence(5);

		$this->todo->validate($title);

		$errors = $this->todo->errors();


		$this->assertArrayNotHasKey('title', $errors);

	}

	/** @test */

	public function validationPassesWhenAllFieldsAreSet()
	{

		$title = $this->faker->sentence(5);

		$this->assertTrue($this->todo->validate($title));

	}

	/** @test */

	public function itWillReturnTheIdAsNullIfNotPersisted()
	{
		$this->assertInternalType('null', $this->todo->getId());
	}

}