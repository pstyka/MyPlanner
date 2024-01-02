<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        $this->render('login');
    }
    public function menu() {
        $this->render('menu');
    }
    public function sign() {
        $this->render('sign');
    }
    public function profile() {
        $this->render('profile');
    }

    public function quests() {
        $this->render('quests');
    }
}