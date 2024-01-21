<?php

require_once 'Repository.php';

class PlanRepository extends \Repository
{
    public function addTask($userId, $taskName, $taskDescription, $startHour, $endHour)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO make_your_plan (users_id, name, description, start_time,end_time, date) VALUES (?, ?, ?, ?, ?, ?)
        ');
        $formattedStartHour = date('H:i:s', strtotime($startHour));
        $formattedEndHour = date('H:i:s', strtotime($endHour));
        $date = date('Y-m-d');
        $stmt->execute([$userId, $taskName, $taskDescription, $formattedStartHour, $formattedEndHour, $date]);
    }
    public function getTasks($date)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT name, description,start_time, end_time FROM make_your_plan WHERE date = ?
    ');

        $stmt->execute([$date]);
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }
    public function deleteTasksNotForDate($date)
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM make_your_plan WHERE date != ?
    ');

        $stmt->execute([$date]);
    }

}