<?php

use models\User;

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['nickname'],
            $user['users_id']
        );
    }
    public function addUser(User $user): void{

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email=$_POST['email'];
            $name = $_POST["name"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
        }
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users (nickname,email,password)
                    VALUES (?,?,?,?,?)'
        );
        $stmt->execute([
            $user->getName(),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }
    public function getUserId(String $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':users_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}