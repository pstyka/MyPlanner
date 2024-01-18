<?php

use models\Quest;

require_once 'Repository.php';
require_once __DIR__.'/../models/Quest.php';
class QuestsRepository extends Repository
{
    private $drawnQuests = [];
    public function getAllQuests(): array
    {
        session_start();
        $currentUserId = $_SESSION['user_id'];
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT dq.*
            FROM dailyquests dq
            JOIN userquests uq ON dq.daily_quests_id = uq.daily_quests_id
            WHERE uq.user_id = :currentUserId   
        ');
        $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
        $stmt->execute();
        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($quests as $quest){
            $result[] = new Quest(
              $quest['name'],
              $quest['description'],
              $quest['points'],
              $quest['daily_quest_id']
            );
        }
        return $result;
    }
    public function createQuest(){
        do{
            $quest = $this->getRandomQuest();
        }
        while(in_array($quest->getId(),$this->drawnQuests));
        $this->drawnQuests[]=$quest->getId();
        return $quest;

    }
    public function getRandomQuest()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM dailyquests ORDER BY RANDOM() LIMIT 1
    ');
        $stmt->execute();
        $questdata = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$questdata) {
            return null;
        }

        $quest = new Quest(

            $questdata['name'],
            $questdata['description'],
            $questdata['points'],
            $questdata['daily_quests_id']
        );

        return $quest;
    }


}