<?php

use models\User;

require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';
require_once 'AppController.php';
class SecurityController extends AppController
{
    public function login(){
        session_start();

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
        if(password_verify($password,$user->getPassword())){

            $user_id = $userRepository->getUser($email)->getUserid();
            $_SESSION['user_id'] = $user_id;
            return $this->render('menu');
        }
        if($user->getPassword() != $password) {
            return $this->render('login',['messages'=>['Wrong pasword!']]);
        }
    }
    public function logout(){
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['quest_id']);
        session_destroy();
        return $this->render('login');
    }
    public function register()
    {
        if ($this->isPost()) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userRepository = new UserRepository();
            $user = new User($email, $hashedPassword, $name);

            try {
                $userRepository->addUser($user);

            } catch (Exception $e) {
                $this->render('register', ['error' => 'Registration failed: ' . $e->getMessage()]);
            }
        }
        return $this->render('login');
    }

}