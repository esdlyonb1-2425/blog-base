<?php

namespace Repository;



namespace Repository;
use Database\Database;

class Repository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo =  Database::getPdo();
    }

}