<?php

namespace models;

class UserStats
{
    private $user_id;
    private $completed_quests;
    public function __construct($user_id, $completed_quests=0)
    {
        $this->user_id=$user_id;
        $this->completed_quests=$completed_quests;
    }


}