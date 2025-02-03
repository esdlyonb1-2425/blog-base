<?php

namespace App\Controller;

use App\Repository\PizzaRepository;
use Core\Controller\Controller;
use Core\Response\Response;

class PizzaController extends Controller
{


    public function index(): Response
    {
        $pizzaRepository = new PizzaRepository();
        $pizzas = $pizzaRepository->findAll();


        return $this->render('pizza/index', [
            'pizzas' => $pizzas
        ]);
    }


    public function exemple() : Response
    {
        return $this->redirect(["type"=>"pizza", "action"=>"index"]);
    }

}