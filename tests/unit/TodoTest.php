<?php

use PHPUnit\Framework\TestCase;
use \App\Models\Todo;

class TodoTest extends Testcase
{
	protected $todo;

	public function setUp()
	{
		$this->product = new Todo();
	}

	/** @test */

	public function validationWillFailIfTitleIsNull()
	{
		$this->assertFalse($this->product->validate(''));
	}
}