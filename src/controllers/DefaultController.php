<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        //TODO display login.html
        $this->render('login');
    }
    public function projects() {
        die("projects method");
        // TODO display projects.html
    }
    public function menu() {
        $this->render('menu');
    }
}