<?php


use repository\UserQuestsRepository;

require_once 'AppController.php';
require_once __DIR__.'/../repository/QuestsRepository.php';
require_once __DIR__.'/../repository/UserQuestsRepository.php';
class QuestsController extends AppController
{
    public function quests()
    {
        $questsRepository = new QuestsRepository();
        $quests = $questsRepository->getAllQuests();
        $this->render('quests', ['quests' => $quests]);
    }

    public function drawQuest()
    {
        $questsRepository = new QuestsRepository();
        $randomQuest = $questsRepository->getRandomQuest();
        $randomQuestName = $randomQuest->getName();
        $randomQuestId = $randomQuest->getId();
        $userQuestRepository = new UserQuestsRepository();
        //$currentUser =
        //$userQuestRepository->addUserQuest(, $randomQuestId);
        $this->render('quests', ['task' => [$randomQuestName]]);
    }
    public function finishQuest(){
        if($this->isPost()){

        }
    }
}