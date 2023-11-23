<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index','DefaultController');
Routing::get('projects','DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('menu','DefaultController');
Routing::run($path);