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

$title = null;
$content=null;

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

}

if($title && $content){


  $updatedArticle = [
            "title" => $title,
            "content" => $content,
            "id" => $id
    ];

    updateArticle($updatedArticle);

    redirect("article", ["id"=>$updatedArticle['id']]);
}

$article = getArticle($id);

render("article/update", ["article"=>$article]);
