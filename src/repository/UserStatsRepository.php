<?php

namespace repository;

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
}