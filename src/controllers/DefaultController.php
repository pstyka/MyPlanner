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
    public function nickname(){
        session_start();
        $currentUserNickname = $_SESSION['user_nickname'];
        echo json_encode(['currentUserNickname' =>$currentUserNickname]);
        exit;
    }
    public function level(){
        session_start();
        $currentUserId= $_SESSION['user_id'];
        $userStatsRepository = new \repository\UserStatsRepository();
        $level = $userStatsRepository->getLevel($currentUserId);
        echo json_encode(['currentLevel'=>$level]);
    }
    public function points(){
        session_start();
        $currentUserId= $_SESSION['user_id'];
        $userStatsRepository = new \repository\UserStatsRepository();
        $points = $userStatsRepository->getPoints($currentUserId);
        echo json_encode(['currentPoints'=>$points]);
    }



}