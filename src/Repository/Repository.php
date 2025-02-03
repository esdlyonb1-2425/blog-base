<?php

namespace App\Repository;



use Core\Database\Database;

class Repository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo =  Database::getPdo();
    }

}