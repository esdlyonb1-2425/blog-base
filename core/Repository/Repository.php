<?php

namespace Core\Repository;



use Core\Database\Database;

abstract class Repository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo =  Database::getPdo();
    }

}