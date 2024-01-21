<?php


require_once 'AppController.php';
require_once __DIR__.'/../repository/PlanRepository.php';

class PlanController extends \AppController
{
    public function plan()
    {
        session_start();
        $this->logincheck();
        $this->render("plan");
    }
    public function saveTask()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['description'], $_POST['start-hour'],$_POST['end-hour'])) {
            $planRepository = new PlanRepository();
            $currentUserId=$_SESSION['user_id'];
            $taskName = $_POST['name'];
            $taskDescription = $_POST['description'];
            $startHour = $_POST['start-hour'];
            $endHour = $_POST['end-hour'];

            $planRepository->addTask($currentUserId,$taskName, $taskDescription, $startHour, $endHour);
            $this->render("plan");
        }
    }
    public function getAllTasks()
    {
        session_start();
        $currentDate = date('Y-m-d');
        $planRepository = new PlanRepository();
        $tasks = $planRepository->getTasks($currentDate);
        echo json_encode($tasks, JSON_PRETTY_PRINT);
        exit;
    }





}