<?php

require_once('app/Controllers/Controller.php');
require_once('app/Models/Model.php');
require_once('app/Database/DB.php');
require_once('app/Models/Todo.php');
require_once('app/Controllers/TodosController.php');
require_once('app/Router.php');

$url = $_SERVER['REQUEST_URI'];


App\Router::direct($url);
