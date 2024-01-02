<?php

namespace repository;
use Repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/Quest.php';
class UserQuestsRepository extends Repository
{
    public function addUserQuest($userId, $questId)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO userquests (user_id, dailyquests_id) VALUES (?, ?)
        ');
        $stmt->execute([$userId, $questId]);
    }
    public function getUserQuest(){

    }
}