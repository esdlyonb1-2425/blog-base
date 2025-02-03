<?php

namespace App\Controller;

use Core\View\View;

class HomeController
{


    public function coucou()
    {
        View::render('home/coucou', []);
    }

    public function accueil(   )
    {
        View::render('home/accueil', []);
    }
}