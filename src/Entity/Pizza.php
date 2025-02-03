<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'pizzas')]
#[TargetRepository(name: PizzaRepository::class)]
class Pizza
{

    private $id;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}