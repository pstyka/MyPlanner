<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        $this->render('login');
    }
    public function menu() {
        session_start();
        $this->loginCheck();
        $this->render('menu');
    }
    public function sign() {
        $this->render('sign');
    }
    public function profile() {
        session_start();
        $this->logincheck();
        //$nickname = $this->userRepository->getName();
        $this->render('profile');
    }



}