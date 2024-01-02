<?php

namespace models;

class Quest
{
    private $name;
    private $description;
    private $points;
    private $id;
    public function __construct( $name, $description, $points,$id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->points = $points;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points): void
    {
        $this->points = $points;
    }


}