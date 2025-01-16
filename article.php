<?php
session_start();

require_once("logique/requetes.php");
require_once("logique/display.php");
require_once("logique/response.php");

$id =null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if(!$id){
    redirect();
}

$article = getArticle($id);

if(!$article){redirect();}

render("article/show", [
        "article" => $article,
        "pageTitle" => $article["title"],
]);

