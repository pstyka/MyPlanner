<?php

use models\User;

require_once __DIR__.'/../models/User.php';

require_once 'AppController.php';
class SecurityController extends AppController
{
    public function login(){
        $user = new User('pawel.styka@student.pk.edu.pl','pawel123','Pawel','Styka');

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user->getEmail() != $email) {
            return $this->render('login',['messages'=>['User with this email do not exist!']]);
        }
        if($user->getPassword() != $password) {
            return $this->render('login',['messages'=>['Wrong pasword!']]);
        }
        
        return $this->render('menu');
    }
}