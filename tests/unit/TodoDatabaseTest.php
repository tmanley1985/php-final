<?php

use \App\Models\Todo;
use \Faker\Factory as Faker;

class TodoDatabaseTest extends \PHPUnit_Extensions_Database_TestCase
{
	protected $todo;

	public function setUp()
	{
		parent::setUp();

		$this->todo = new Todo();

	}

	/**
    * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
    */
    public function getConnection()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=homestead', 'homestead', 'secret');

        return $this->createDefaultDBConnection($pdo,'homestead');
    }

    /**
    * @return PHPUnit_Extensions_Database_DataSet_IDataSet
    */
    public function getDataSet()
    {
        return $this->createMySQLXMLDataSet(__DIR__ . '/todos.xml');

    }

    /** @test */

	public function canGetConnection()
	{
		$this->getConnection()->createDataSet(array('todos'));

        $todo = $this->getDataSet();

        $queryTable = $this->getConnection()->createQueryTable(

            'todos', 'SELECT * FROM todos'
        );

        $expectedTable = $this->getDataSet()->getTable('todos');

        //Here we check that the table in the database matches the data in the XML file
        $this->assertTablesEqual($expectedTable, $queryTable);
	}


    /** @test */

	public function databaseIsEmpty()
	{

        //Here we check that the table in the database matches the data in the XML file
        $this->assertTableRowCount('todos', 11);
	}

	/** @test */

	public function todoIsPersistedInDatabase()
	{

		$title = Faker::create()->sentence(5);

		$this->todo->save($title);

        //Here we check that the table in the database matches the data in the XML file
        $this->assertTableRowCount('todos', 12);
	}

	/** @test */

	public function todoIsUpdated()
	{
		$rowCount = $this->getConnection()->getRowCount('todos');
		
		$title = Faker::create()->sentence(5);

		$this->todo->update($this->todo->getId(), $title);

		$newRowCount = $this->getConnection()->getRowCount('todos');

		$this->assertEquals($rowCount, $newRowCount );

	}

	/** @test */

	public function todoIsDeleted()
	{
		$rowCount = $this->getConnection()->getRowCount('todos');
		
		$this->todo->destroy($this->todo->getId());

		$newRowCount = $this->getConnection()->getRowCount('todos');

		$this->assertFalse($rowCount == ($newRowCount - 1));

	}

	public function tearDown()
	{
		parent::tearDown();
	}

}