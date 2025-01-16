<?php
require_once 'logique/requetes.php';
require_once "logique/display.php";
session_start();

$articles = getArticles();

render("article/index", [
    "pageTitle" => "Accueil",
    "articles" => $articles
]);

?>
