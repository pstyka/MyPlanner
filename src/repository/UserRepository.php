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

    public function addUser(User $user): void {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users (email, password, nickname)
        VALUES (?, ?, ?)'
        );
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName()
        ]);
    }
    public function getHashedPassword(String $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $hashedPassword=$stmt->fetch(PDO::FETCH_ASSOC);
        return $hashedPassword;
    }

}