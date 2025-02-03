<?php

namespace App\Controller;

use App\Repository\PizzaRepository;
use Core\View\View;

class PizzaController
{


    public function index()
    {
        $pizzaRepository = new PizzaRepository();
        $pizzas = $pizzaRepository->findAllPizzas();


        View::render('pizza/index', [
            'pizzas' => $pizzas
        ]);
    }
}