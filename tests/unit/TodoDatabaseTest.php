<?php

use \App\Models\Todo;
use \Faker\Factory as Faker;

class TodoDatabaseTest extends \PHPUnit_Extensions_Database_TestCase
{
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

}