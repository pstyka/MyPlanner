<?php

namespace repository;

use PDO;
use Repository;
require_once 'Repository.php';

class UserStatsRepository extends Repository
{
    public Function addUserStats(){

    }
    public function incrementCompletedQuests($userId)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE userstats SET completed_quests = completed_quests + 1 WHERE user_id = ?
        ');

        $stmt->execute([$userId]);
    }
    public function completedQuests($userId){
        $stmt = $this->database->connect()->prepare('
            SELECT completed_quests FROM userstats WHERE user_id = ?
        ');

        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['completed_quests'] ?? 0;
    }



}