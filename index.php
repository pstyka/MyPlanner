<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get("",'DefaultController');
Routing::get('index','DefaultController');
Routing::get('menu','DefaultController');
Routing::post('login', 'SecurityController');
Routing::get('sign','DefaultController');
Routing::get('profile','DefaultController');
Routing::get('quests','QuestsController');
Routing::get('drawQuest', 'QuestsController');
Routing::post('register','SecurityController');
Routing::get('logout','SecurityController');
Routing::get('finishQuest','QuestsController');
Routing::get('completedQuests','QuestsController');
Routing::get("nickname",'DefaultController');
Routing::get("plan",'PlanController');
Routing::post('saveTask','PlanController');
Routing::get('getAllTasks','PlanController');

Routing::run($path);