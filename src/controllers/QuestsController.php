<?php


use repository\UserQuestsRepository;

require_once 'AppController.php';
require_once __DIR__.'/../repository/QuestsRepository.php';
require_once __DIR__.'/../repository/UserQuestsRepository.php';
require_once __DIR__.'/../repository/UserStatsRepository.php';
class QuestsController extends AppController
{
    private $questsRepository;
    private $drawnQuests;


    public function getDrawnQuests()
    {
        return $this->drawnQuests;
    }
    public function setDrawnQuests($drawnQuests): void
    {
        $this->drawnQuests = $drawnQuests;
    }
    public function __construct()
    {
        parent::__construct();
        $this->questsRepository = new QuestsRepository();
        $this->drawnQuests = 0;
    }

    public function quests()
    {
        session_start();
        $this->loginCheck();
        $quests = $this->questsRepository->getAllQuests();
        $this->render('quests', ['quests' => $quests]);
    }

    public function drawQuest()
    {
        session_start();
        $q = new QuestsRepository();

        $randomQuest = $q->createQuest();
        $_SESSION['quest_id']=$randomQuest->getId();
        $randomQuestId = $_SESSION['quest_id'];
        $userQuestRepository = new UserQuestsRepository();
        $currentUserId = $_SESSION["user_id"];
        $userQuestRepository->addUserQuest($currentUserId, $randomQuestId);

       // $this->setDrawnQuests($this->getDrawnQuests()+1);

        $quests = $this->questsRepository->getAllQuests();
        $this->render('quests', ['quests' => $quests]);;
    }
    public function finishQuest(){
        session_start();
        $currentUserId = $_SESSION["user_id"];
        $userQuestRepository = new UserQuestsRepository();
        $userStatsRepository = new \repository\UserStatsRepository();
        $userQuestId = $_SESSION['quest_id'];
        $userQuestRepository->deleteUserQuest($currentUserId, $userQuestId);
        $userStatsRepository->incrementCompletedQuests($currentUserId);
        $this->setDrawnQuests($this->getDrawnQuests() - 1);
        $quests = $this->questsRepository->getAllQuests();
        $this->render('quests', ['quests' => $quests, 'message' => 'Quest finished successfully']);
    }
}