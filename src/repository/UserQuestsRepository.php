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
        INSERT INTO userquests (user_id, daily_quests_id) VALUES (?, ?)
        ON CONFLICT (user_id, daily_quests_id) DO NOTHING
    ');

        $stmt->execute([$userId, $questId]);
    }
    public function getUserQuest(){

    }
    public function deleteUserQuest($userId, $questId)
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM userquests WHERE user_id = ? AND daily_quests_id = ?
    ');
        $stmt->execute([$userId, $questId]);
    }
}