<?php

namespace Repository;

use Database\Database;
class UserRepository extends Repository
{


    public function findUserByUsername(string $username) : array| bool
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute([
            "username"=> $username
        ]);
        $user = $query->fetch();
        return $user;
    }



}