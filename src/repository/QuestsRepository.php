<?php

use models\Quest;

require_once 'Repository.php';
require_once __DIR__.'/../models/Quest.php';
class QuestsRepository extends Repository
{
    public function getAllQuests(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM dailyquests'
        );
        $stmt->execute();
        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($quests as $quest){
            $result = new Quest(
              $quest['name'],
              $quest['description'],
              $quest['points'],
              $quest['daily_quest_id']
            );
        }
        return $result;
    }

    public function getRandomQuest()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dailyquests ORDER BY RANDOM() LIMIT 1
        ');
        $stmt->execute();
        $questdata = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$questdata){
            return null;
        }
       $quest = new Quest(
           $questdata['id'],
           $questdata['name'],
           $questdata['description'],
           $questdata['points']
       );
        return $quest;
    }


}