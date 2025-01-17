<?php
require_once "../src/Controller/ArticleController.php";
require_once "../src/Repository/ArticleRepository.php";
require_once "../core/Database/Database.php";
require_once "../core/View/View.php";


$controller = new \Controller\ArticleController();
$controller->index();