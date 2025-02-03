<?php

namespace Core\Kernel;

class Kernel
{

    public static function run()
    {
        $type = "article";
        $action = "index";
        if(!empty($_GET['type'])){ $type = $_GET['type']; }
        if(!empty($_GET['action'])){ $action = $_GET['action']; }


        $type = ucfirst($type); // Article
        $controllerName = "App\Controller\\".$type."Controller";

        $controller = new $controllerName();
        $controller->$action();
    }


}