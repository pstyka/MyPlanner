<?php

require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';
require_once 'AppController.php';
class SecurityController extends AppController
{
    public function login(){

        $userRepository = new UserRepository();
        if(!$this->isPost()){
            return $this->render('login');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login',['messages'=>['User with this email do not exist!']]);
        }
        if($user->getEmail() != $email) {
            return $this->render('login',['messages'=>['User with this email do not exist!']]);
        }
        if($user->getPassword() != $password) {
            return $this->render('login',['messages'=>['Wrong pasword!']]);
        }
        $user_id = $userRepository->getUser($email)->getUserid();
        session_start();
        $_SESSION['user_id'] = $user_id;
        return $this->render('menu');
    }
}