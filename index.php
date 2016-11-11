<?php

require 'vendor/autoload.php';


/** @type string $url The uri string. */
$url = $_SERVER['REQUEST_URI'];


App\Router::direct($url);
