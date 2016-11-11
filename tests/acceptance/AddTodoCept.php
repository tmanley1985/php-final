<?php 
$I = new AcceptanceTester($scenario);

$I->am('A user');

$I->wantTo('Add a todo');

$I->amOnPage('/');

$I->click('Create New Todo');

$I->see('Create A New Todo');

$I->submitForm('#create-todo', ['title' => 'Added another todo']);

$I->see('TodoApp');
