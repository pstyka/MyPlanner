<?php

namespace models;

class User
{
    private $email;
    private $password;
    private $name;
    private $userid;

    public function __construct(string $email, string $password, string $name, $userid=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->userid = $userid;

    }
    public function getUserid()
    {
        return $this->userid;
    }

    public function setUserid($userid): void
    {
        $this->userid = $userid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }





}