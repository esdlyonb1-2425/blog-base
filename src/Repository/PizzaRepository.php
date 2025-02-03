<?php

namespace App\Repository;

use Core\Repository\Repository;

class PizzaRepository extends Repository
{

    public function findAllPizzas() : array
    {
        $query = $this->pdo->prepare("SELECT * FROM pizzas");
        $query->execute();
        $pizzas = $query->fetchAll();
        return $pizzas;
    }

}