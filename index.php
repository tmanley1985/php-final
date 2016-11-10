<?php

require 'vendor/autoload.php';



$url = $_SERVER['REQUEST_URI'];


App\Router::direct($url);
