<?php
session_start();
require_once 'logique/requetes.php';
require_once 'logique/response.php';
require_once 'logique/display.php';

if(empty($_SESSION["id"])){

redirect("index", ["message"=>"please log in first"]);
}

$title = null;
$content=null;

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

}


if($title && $content)
    {

        $newArticle = [
                "title" => $title,
                "content" => $content,
                "user_id" => $_SESSION["id"]
            ];

       $id =  addArticle($newArticle);

        redirect();
    }

render("article/new", [
        "pageTitle" => "New Article",
]);




