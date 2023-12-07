<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        //TODO display login.php
        $this->render('login');
    }
    public function menu() {
        $this->render('menu');
    }
    public function sign() {
        $this->render('sign');
    }
}