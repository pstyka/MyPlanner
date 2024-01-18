<?php


use repository\UserQuestsRepository;

require_once 'AppController.php';
require_once __DIR__.'/../repository/QuestsRepository.php';
require_once __DIR__.'/../repository/UserQuestsRepository.php';
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
        if($this->getDrawnQuests() >=3){
            $this->render('quests',['message'=>"There is a limit for 3 quests at the same time!"]);
        }
        $randomQuest = $q->createQuest();
        $_SESSION['quest_id']=$randomQuest->getId();
        $randomQuestId = $_SESSION['quest_id'];
        $userQuestRepository = new UserQuestsRepository();
        $currentUserId = $_SESSION["user_id"];
        $userQuestRepository->addUserQuest($currentUserId, $randomQuestId);

        $this->setDrawnQuests($this->getDrawnQuests()+1);

        $quests = $this->questsRepository->getAllQuests();
        $this->render('quests', ['quests' => $quests]);;
    }
    public function finishQuest(){
        if($this->isPost()){

        }
    }
}